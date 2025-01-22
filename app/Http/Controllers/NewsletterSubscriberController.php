<?php

namespace App\Http\Controllers;

use App\Helpers\EmailConfig;
use App\Models\NewsletterSubscriber;
use App\Http\Requests\StoreNewsletterSubscriberRequest;
use App\Http\Requests\UpdateNewsletterSubscriberRequest;
use App\Models\General;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SoDe\Extend\Crypto;

class NewsletterSubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsletterSubscriberRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(NewsletterSubscriber $newsletterSubscriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewsletterSubscriber $newsletterSubscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsletterSubscriberRequest $request, NewsletterSubscriber $newsletterSubscriber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsletterSubscriber $newsletterSubscriber)
    {
        //
    }

    public function showSubscripciones(){
        
        $subscripciones = NewsletterSubscriber::orderBy('created_at','desc')->where('is_verified', true)->where('active', '=', 1)->get();
        
        return view('pages.subscripciones.index', compact('subscripciones'));

    }

    public function saveSubscripciones(Request $request){
        
        $request->validate(['email' => 'required|email']);
        $token = Crypto::randomUUID();
        $data = $request->all() ; 
        // $data['nombre'] = $data['full_name'];
        // NewsletterSubscriber::create($data);
        NewsletterSubscriber::create([
          'email' => $data['email'],
          'verification_token' => $token,
      ]);

        $verificationLink = route('verify', ['token' => $token]);

        $this->validarCorreo($data, $verificationLink);
        
        return response()->json(['message'=> 'Suscrito Correctamente']);

    }

    public function saveSubscripciones2(Request $request){
        
      $request->validate([
        'email' => 'required|email',
      ]);

      $token = Crypto::randomUUID();
      $data = $request->all();

     
      $existingSubscriber = NewsletterSubscriber::where('email', $data['email'])
          ->where('active', 0)
          ->where('is_verified', 0)
          ->first();

      if ($existingSubscriber) {
          return response()->json(['message' => 'Usuario existente sin verificar. Revise su bandeja de entrada'], 400);
      }

    
      NewsletterSubscriber::create([
          'email' => $data['email'],
          'nombre' => $data['full_name'],
          'verification_token' => $token,
      ]);

      $verificationLink = route('verify', ['token' => $token]);

      $this->validarCorreo($data, $verificationLink);

      return response()->json(['message' => 'Enlace de verificación enviado a su bandeja de entrada']);

  }


  public function verify($token)
  {
      $subscriber = NewsletterSubscriber::where('verification_token', $token)->first();

      if (!$subscriber) {
          // return redirect('/')->with('error', 'Token de verificación inválido.');
          session()->flash('error', 'Token de verificación inválido.');
      }

      $subscriber->update([
          'is_verified' => true,
          'verification_token' => null,
          'active' => 1,
      ]);

      $this->envioCorreoAdmin($subscriber);
      $this->envioCorreoCliente($subscriber);

      session()->flash('success', 'Tu suscripción ha sido confirmada.');
      // return redirect('/')->with('success', 'Tu suscripción ha sido confirmada.');
      return redirect('/');
  }


    private function validarCorreo($data, $verificationLink){
     
      $generales = General::first();
      $appUrl = env('APP_URL');
      $name = 'Redconex';
      $mensaje = "Confirmacion de correo electrónico";
      $mail = EmailConfig::config($name, $mensaje);

      try {
        $mail->addAddress($data['email']);
        $mail->Body =
              '<!DOCTYPE html>
              <html>
                  <head>
                      <meta charset="utf-8" />
                      <meta http-equiv="x-ua-compatible" content="ie=edge" />
                      <title>Confirmar correo electrónico</title>
                      <meta name="viewport" content="width=device-width, initial-scale=1" />
                      <style type="text/css">
                          /**
                 * Google webfonts. Recommended to include the .woff version for cross-client compatibility.
                 */
                          @media screen {
                              @font-face {
                                  font-family: "Source Sans Pro";
                                  font-style: normal;
                                  font-weight: 400;
                                  src: local("Source Sans Pro Regular"),
                                      local("SourceSansPro-Regular"),
                                      url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff)
                                          format("woff");
                              }
              
                              @font-face {
                                  font-family: "Source Sans Pro";
                                  font-style: normal;
                                  font-weight: 700;
                                  src: local("Source Sans Pro Bold"),
                                      local("SourceSansPro-Bold"),
                                      url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff)
                                          format("woff");
                              }
                          }
              
                          /**
                 * Avoid browser level font resizing.
                 * 1. Windows Mobile
                 * 2. iOS / OSX
                 */
                          body,
                          table,
                          td,
                          a {
                              -ms-text-size-adjust: 100%;
                              /* 1 */
                              -webkit-text-size-adjust: 100%;
                              /* 2 */
                          }
              
                          /**
                 * Remove extra space added to tables and cells in Outlook.
                 */
                          table,
                          td {
                              mso-table-rspace: 0pt;
                              mso-table-lspace: 0pt;
                          }
              
                          /**
                 * Better fluid images in Internet Explorer.
                 */
                          img {
                              -ms-interpolation-mode: bicubic;
                          }
              
                          /**
                 * Remove blue links for iOS devices.
                 */
                          a[x-apple-data-detectors] {
                              font-family: inherit !important;
                              font-size: inherit !important;
                              font-weight: inherit !important;
                              line-height: inherit !important;
                              color: inherit !important;
                              text-decoration: none !important;
                          }
              
                          /**
                 * Fix centering issues in Android 4.4.
                 */
                          div[style*="margin: 16px 0;"] {
                              margin: 0 !important;
                          }
              
                          body {
                              width: 100% !important;
                              height: 100% !important;
                              padding: 0 !important;
                              margin: 0 !important;
                          }
              
                          /**
                 * Collapse table borders to avoid space between cells.
                 */
                          table {
                              border-collapse: collapse !important;
                          }
              
                          a {
                              color: #1a82e2;
                          }
              
                          img {
                              height: auto;
                              line-height: 100%;
                              text-decoration: none;
                              border: 0;
                              outline: none;
                          }
                      </style>
                  </head>
              
                  <body style="background-color: #e9ecef">
                      <!-- start preheader -->
                      <div
                          class="preheader"
                          style="
                              display: none;
                              max-width: 0;
                              max-height: 0;
                              overflow: hidden;
                              font-size: 1px;
                              line-height: 1px;
                              color: #fff;
                              opacity: 0;
                          "
                      >
                          A preheader is the short summary text that follows the subject line
                          when an email is viewed in the inbox.
                      </div>
                      <!-- end preheader -->
              
                      <!-- start body -->
                      <table border="0" cellpadding="0" cellspacing="0" width="100%">
                          <!-- start logo -->
                          <tr>
                              <td align="center" bgcolor="#e9ecef">
                                  <!--[if (gte mso 9)|(IE)]>
                      <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                      <tr>
                      <td align="center" valign="top" width="600">
                      <![endif]-->
                                  <table
                                      border="0"
                                      cellpadding="0"
                                      cellspacing="0"
                                      width="100%"
                                      style="max-width: 600px"
                                  >
                                      <tr>
                                          <td
                                              align="center"
                                              valign="top"
                                              style="padding: 36px 24px"
                                          >
                                              <a
                                                  href="https://mundoweb.pe"
                                                  target="_blank"
                                                  style="display: inline-block"
                                              >
                                                  <!-- <img src="https://atalaya.mundoweb.pe/assets/img/logo-dark.svg" alt="Logo" border="0" width="250"
                                style="display: block; width: 250px; max-width: 250px; min-width: 250px;"> -->
                                                  <?xml version="1.0" encoding="UTF-8"?>
                                                  <svg
                                                      xmlns="http://www.w3.org/2000/svg"
                                                      xmlns:xlink="http://www.w3.org/1999/xlink"
                                                      width="250px"
                                                      height="41px"
                                                      viewBox="0 0 252 41"
                                                      version="1.1"
                                                  >
                                                      <g id="surface1">
                                                          <path
                                                              style="
                                                                  stroke: none;
                                                                  fill-rule: evenodd;
                                                                  fill: rgb(
                                                                      19.607843%,
                                                                      22.745098%,
                                                                      27.45098%
                                                                  );
                                                                  fill-opacity: 1;
                                                              "
                                                              d="M 40.925781 20.539062 L 40.925781 13.691406 C 40.925781 6.128906 34.820312 0 27.285156 0 L 27.285156 6.847656 C 27.285156 14.410156 33.394531 20.539062 40.925781 20.539062 C 33.390625 20.539062 27.285156 26.667969 27.285156 34.234375 L 27.285156 13.691406 C 27.285156 6.128906 21.175781 0 13.640625 0 L 0 0 L 0 20.539062 L 13.640625 20.539062 L 13.640625 6.847656 C 13.640625 14.410156 19.75 20.539062 27.285156 20.539062 L 13.640625 20.539062 L 13.640625 41.078125 L 27.285156 41.078125 C 34.820312 41.078125 40.925781 34.949219 40.925781 27.386719 Z M 40.925781 20.539062 "
                                                          />
                                                          <path
                                                              style="
                                                                  stroke: none;
                                                                  fill-rule: evenodd;
                                                                  fill: rgb(
                                                                      19.607843%,
                                                                      22.745098%,
                                                                      27.45098%
                                                                  );
                                                                  fill-opacity: 1;
                                                              "
                                                              d="M 54.570312 20.410156 C 47.035156 20.410156 40.925781 26.578125 40.925781 34.191406 L 40.925781 41.078125 C 48.460938 41.078125 54.570312 34.910156 54.570312 27.300781 Z M 54.570312 20.410156 "
                                                          />
                                                          <path
                                                              style="
                                                                  stroke: none;
                                                                  fill-rule: evenodd;
                                                                  fill: rgb(
                                                                      19.607843%,
                                                                      22.745098%,
                                                                      27.45098%
                                                                  );
                                                                  fill-opacity: 1;
                                                              "
                                                              d="M 66.667969 30.335938 L 66.667969 10.335938 L 75.5625 10.335938 L 78.304688 17.050781 C 78.691406 17.992188 79.234375 19.636719 79.847656 21.964844 L 80.148438 21.964844 C 80.777344 19.636719 81.335938 17.964844 81.707031 17.035156 L 84.375 10.335938 L 93.203125 10.335938 L 93.203125 30.335938 L 86.0625 30.335938 L 86.0625 24.007812 C 86.0625 22.878906 86.089844 21.675781 86.234375 19.976562 L 85.949219 19.933594 L 82.507812 30.332031 L 77.367188 30.332031 L 73.9375 19.933594 L 73.640625 19.976562 C 73.765625 21.675781 73.8125 22.878906 73.8125 24.007812 L 73.8125 30.335938 Z M 66.667969 30.335938 "
                                                          />
                                                          <path
                                                              style="
                                                                  stroke: none;
                                                                  fill-rule: evenodd;
                                                                  fill: rgb(
                                                                      19.607843%,
                                                                      22.745098%,
                                                                      27.45098%
                                                                  );
                                                                  fill-opacity: 1;
                                                              "
                                                              d="M 154.539062 23.015625 L 154.539062 22.542969 C 154.539062 17.59375 157.699219 14.824219 163.875 14.824219 C 170.054688 14.824219 173.214844 17.59375 173.214844 22.542969 L 173.214844 23.015625 C 173.214844 27.945312 170.039062 30.746094 163.875 30.746094 C 157.699219 30.742188 154.539062 27.945312 154.539062 23.015625 Z M 165.769531 23.5 L 165.769531 22.066406 C 165.769531 20.160156 165.15625 19.269531 163.875 19.269531 C 162.59375 19.269531 161.980469 20.160156 161.980469 22.066406 L 161.980469 23.5 C 161.980469 25.394531 162.59375 26.296875 163.875 26.296875 C 165.15625 26.296875 165.769531 25.394531 165.769531 23.5 Z M 165.769531 23.5 "
                                                          />
                                                          <path
                                                              style="
                                                                  stroke: none;
                                                                  fill-rule: evenodd;
                                                                  fill: rgb(
                                                                      19.607843%,
                                                                      22.745098%,
                                                                      27.45098%
                                                                  );
                                                                  fill-opacity: 1;
                                                              "
                                                              d="M 150.039062 10.335938 L 145.671875 10.335938 L 145.671875 17.753906 C 144.507812 15.972656 142.855469 15.066406 140.480469 15.066406 C 136.480469 15.066406 134.535156 17.429688 134.535156 22.460938 L 134.535156 23.144531 C 134.535156 28.117188 136.480469 30.539062 140.480469 30.539062 C 142.910156 30.539062 144.550781 29.601562 145.671875 27.832031 L 145.671875 30.285156 L 153.007812 30.285156 L 153.007812 10.335938 Z M 143.714844 26.265625 C 142.46875 26.265625 141.871094 25.355469 141.871094 23.445312 L 141.871094 22.105469 C 141.871094 20.179688 142.46875 19.253906 143.714844 19.253906 C 145.03125 19.253906 145.671875 20.238281 145.671875 22.246094 L 145.671875 23.300781 C 145.671875 25.296875 145.03125 26.265625 143.714844 26.265625 Z M 143.714844 26.265625 "
                                                          />
                                                          <path
                                                              style="
                                                                  stroke: none;
                                                                  fill-rule: evenodd;
                                                                  fill: rgb(
                                                                      19.607843%,
                                                                      22.745098%,
                                                                      27.45098%
                                                                  );
                                                                  fill-opacity: 1;
                                                              "
                                                              d="M 128 15.027344 C 125.414062 15.027344 123.550781 15.992188 122.117188 17.960938 L 122.117188 15.515625 C 122.117188 15.441406 122.117188 15.363281 122.117188 15.285156 L 114.941406 15.285156 L 114.941406 30.335938 L 122.117188 30.335938 L 122.117188 23.429688 C 122.117188 21.121094 122.84375 19.832031 124.171875 19.832031 C 125.160156 19.832031 125.617188 20.390625 125.617188 21.566406 L 125.617188 30.335938 L 133.105469 30.335938 L 133.105469 19.601562 C 133.105469 16.519531 131.347656 15.027344 128 15.027344 Z M 128 15.027344 "
                                                          />
                                                          <path
                                                              style="
                                                                  stroke: none;
                                                                  fill-rule: evenodd;
                                                                  fill: rgb(
                                                                      19.607843%,
                                                                      22.745098%,
                                                                      27.45098%
                                                                  );
                                                                  fill-opacity: 1;
                                                              "
                                                              d="M 112.011719 15.335938 L 105.882812 15.335938 L 105.882812 22.199219 C 105.882812 24.488281 105.152344 25.757812 103.808594 25.757812 C 102.835938 25.757812 102.363281 25.199219 102.363281 24.035156 L 102.363281 15.335938 L 95.039062 15.335938 L 95.039062 26 C 95.039062 29.046875 96.785156 30.539062 100.132812 30.539062 C 102.726562 30.539062 104.597656 29.582031 106.039062 27.625 L 106.039062 29.871094 C 106.035156 30.007812 106.035156 30.140625 106.039062 30.285156 L 113.203125 30.285156 L 113.203125 15.335938 Z M 112.011719 15.335938 "
                                                          />
                                                          <path
                                                              style="
                                                                  stroke: none;
                                                                  fill-rule: evenodd;
                                                                  fill: rgb(
                                                                      19.607843%,
                                                                      22.745098%,
                                                                      27.45098%
                                                                  );
                                                                  fill-opacity: 1;
                                                              "
                                                              d="M 187.710938 30.335938 L 183.519531 10.335938 L 190.984375 10.335938 L 192.457031 19.25 C 192.6875 20.621094 192.886719 22.265625 193 24.164062 L 193.285156 24.164062 C 193.5 22.277344 193.757812 20.550781 194.015625 19.179688 L 195.660156 10.335938 L 201.9375 10.335938 L 203.78125 19.222656 C 204.066406 20.59375 204.296875 22.277344 204.46875 24.164062 L 204.78125 24.164062 C 204.9375 22.277344 205.125 20.664062 205.324219 19.292969 L 206.613281 10.335938 L 213.832031 10.335938 L 209.828125 30.332031 L 200.578125 30.332031 L 199.503906 24.5625 C 199.332031 23.648438 199.046875 21.5625 198.832031 19.277344 L 198.53125 19.277344 C 198.332031 21.5625 198.046875 23.621094 197.875 24.546875 L 196.832031 30.332031 L 187.710938 30.332031 Z M 187.710938 30.335938 "
                                                          />
                                                          <path
                                                              style="
                                                                  stroke: none;
                                                                  fill-rule: evenodd;
                                                                  fill: rgb(
                                                                      19.607843%,
                                                                      22.745098%,
                                                                      27.45098%
                                                                  );
                                                                  fill-opacity: 1;
                                                              "
                                                              d="M 231.855469 24.234375 L 220.730469 24.234375 C 220.789062 25.824219 221.460938 26.601562 222.757812 26.601562 C 223.84375 26.601562 224.445312 26.125 224.585938 24.964844 L 231.8125 25.410156 C 231.339844 28.921875 228.269531 30.746094 222.730469 30.746094 C 216.460938 30.746094 213.320312 28.105469 213.320312 23 L 213.320312 22.640625 C 213.320312 17.492188 216.492188 14.824219 222.789062 14.824219 C 228.898438 14.824219 231.996094 17.421875 231.996094 22.324219 C 231.996094 22.957031 231.953125 23.585938 231.855469 24.234375 Z M 224.570312 20.964844 L 224.570312 20.917969 C 224.570312 19.585938 223.957031 18.957031 222.714844 18.957031 C 221.589844 18.957031 220.945312 19.628906 220.773438 20.964844 Z M 224.570312 20.964844 "
                                                          />
                                                          <path
                                                              style="
                                                                  stroke: none;
                                                                  fill-rule: evenodd;
                                                                  fill: rgb(
                                                                      19.607843%,
                                                                      22.745098%,
                                                                      27.45098%
                                                                  );
                                                                  fill-opacity: 1;
                                                              "
                                                              d="M 246.050781 14.996094 C 243.671875 14.996094 242.011719 15.960938 240.847656 17.769531 L 240.847656 14.664062 C 240.859375 14.457031 240.863281 14.246094 240.863281 14.027344 L 240.863281 10.335938 L 233.527344 10.335938 L 233.527344 30.285156 L 240.847656 30.285156 L 240.847656 27.808594 C 241.96875 29.59375 243.613281 30.539062 246.050781 30.539062 C 250.054688 30.539062 252 28.117188 252 23.144531 L 252 22.460938 C 252 17.429688 250.054688 14.996094 246.050781 14.996094 Z M 244.667969 23.445312 C 244.667969 25.351562 244.066406 26.265625 242.820312 26.265625 C 241.503906 26.265625 240.863281 25.296875 240.863281 23.300781 L 240.863281 22.246094 C 240.863281 20.238281 241.503906 19.253906 242.820312 19.253906 C 244.0625 19.253906 244.667969 20.179688 244.667969 22.105469 Z M 244.667969 23.445312 "
                                                          />
                                                      </g>
                                                  </svg>
                                              </a>
                                          </td>
                                      </tr>
                                  </table>
                                  <!--[if (gte mso 9)|(IE)]>
                      </td>
                      </tr>
                      </table>
                      <![endif]-->
                              </td>
                          </tr>
                          <!-- end logo -->
              
                          <!-- start hero -->
                          <tr>
                              <td align="center" bgcolor="#e9ecef">
                                  <!--[if (gte mso 9)|(IE)]>
                      <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                      <tr>
                      <td align="center" valign="top" width="600">
                      <![endif]-->
                                  <table
                                      border="0"
                                      cellpadding="0"
                                      cellspacing="0"
                                      width="100%"
                                      style="max-width: 600px"
                                  >
                                      <tr>
                                          <td
                                              align="center"
                                              bgcolor="#ffffff"
                                              style="
                                                  padding: 36px 24px!important;
                                                  font-family: "Source Sans Pro", Helvetica,
                                                      Arial, sans-serif;
                                                  border-top: 3px solid #d4dadf;
                                              "
                                          >
                                              <h1
                                                  style="
                                                      margin: 0;
                                                      font-size: 32px;
                                                      font-weight: 700;
                                                      letter-spacing: -1px;
                                                      line-height: 48px;
                                                  "
                                              >
                                                  Confirma tu correo electronico
                                              </h1>
                                          </td>
                                      </tr>
                                  </table>
                                  <!--[if (gte mso 9)|(IE)]>
                      </td>
                      </tr>
                      </table>
                      <![endif]-->
                              </td>
                          </tr>
                          <!-- end hero -->
              
                          <!-- start copy block -->
                          <tr>
                              <td align="center" bgcolor="#e9ecef">
                                  <!--[if (gte mso 9)|(IE)]>
                      <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                      <tr>
                      <td align="center" valign="top" width="600">
                      <![endif]-->
                                  <table
                                      border="0"
                                      cellpadding="0"
                                      cellspacing="0"
                                      width="100%"
                                      style="max-width: 600px"
                                  >
                                      <!-- start copy -->
                                      <tr>
                                          <td
                                              align="center"
                                              bgcolor="#ffffff"
                                              style="
                                                  padding: 24px!important;
                                                  font-family: "Source Sans Pro", Helvetica,
                                                      Arial, sans-serif;
                                                  font-size: 16px;
                                                  line-height: 24px;
                                              "
                                          >
                                              <p style="margin: 0">
                                                  Presiona el botón a continuación para
                                                  confirmar tu dirección de correo
                                                  electrónico. Si no creaste una cuenta con
                                                  <a href="' . $appUrl . '">Redconex</a>, puedes eliminar
                                                  este correo de manera segura.
                                              </p>
                                          </td>
                                      </tr>
                                      <!-- end copy -->
              
                                      <!-- start button -->
                                      <tr>
                                          <td align="left" bgcolor="#ffffff">
                                              <table
                                                  border="0"
                                                  cellpadding="0"
                                                  cellspacing="0"
                                                  width="100%"
                                              >
                                                  <tr>
                                                      <td
                                                          align="center"
                                                          bgcolor="#ffffff"
                                                          style="padding: 12px!important"
                                                      >
                                                          <table
                                                              border="0"
                                                              cellpadding="0"
                                                              cellspacing="0"
                                                          >
                                                              <tr>
                                                                  <td
                                                                      align="center"
                                                                      bgcolor="#ffffff"
                                                                      style="
                                                                          border-radius: 6px;
                                                                      "
                                                                  >
                                                                      <a
                                                                          href="' . $verificationLink . '"
                                                                          target="_blank"
                                                                          style="
                                                                              display: inline-block;
                                                                              padding: 16px
                                                                                  36px!important;
                                                                              font-family: "Source Sans Pro",
                                                                                  Helvetica,
                                                                                  Arial,
                                                                                  sans-serif;
                                                                              font-size: 16px;
                                                                              color: #ffffff;
                                                                              text-decoration: none;
                                                                              border-radius: 6px;
                                                                          "
                                                                          >Confirmar correo
                                                                          electrónico</a
                                                                      >
                                                                  </td>
                                                              </tr>
                                                          </table>
                                                      </td>
                                                  </tr>
                                              </table>
                                          </td>
                                      </tr>
                                      <!-- end button -->
              
                                      <!-- start copy -->
                                      <tr>
                                          <td
                                              align="center"
                                              bgcolor="#ffffff"
                                              style="
                                                  padding: 24px!important;
                                                  font-family: "Source Sans Pro", Helvetica,
                                                      Arial, sans-serif;
                                                  font-size: 16px;
                                                  line-height: 24px;
                                              "
                                          >
                                              <p style="margin: 0">
                                                  Si eso no funciona, copia y pega el
                                                  siguiente enlace en tu navegador:
                                              </p>
                                              <p style="margin: 0">
                                                  <a href="' . $verificationLink . '" target="_blank"
                                                      >' . $verificationLink . '</a
                                                  >
                                              </p>
                                          </td>
                                      </tr>
                                      <!-- end copy -->
              
                                      <!-- start copy -->
                                      <tr>
                                          <td
                                              align="center"
                                              bgcolor="#ffffff"
                                              style="
                                                  padding: 24px!important;
                                                  font-family: "Source Sans Pro", Helvetica,
                                                      Arial, sans-serif;
                                                  font-size: 16px;
                                                  line-height: 24px;
                                                  border-bottom: 3px solid #d4dadf;
                                              "
                                          >
                                              <p style="margin: 0">Redconex<br /></p>
                                          </td>
                                      </tr>
                                      <!-- end copy -->
                                  </table>
                                  <!--[if (gte mso 9)|(IE)]>
                      </td>
                      </tr>
                      </table>
                      <![endif]-->
                              </td>
                          </tr>
                          <!-- end copy block -->
              
                          <!-- start footer -->
                          <tr>
                              <td align="center" bgcolor="#e9ecef" style="padding: 24px!important">
                                  <!--[if (gte mso 9)|(IE)]>
                      <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                      <tr>
                      <td align="center" valign="top" width="600">
                      <![endif]-->
                                  <table
                                      border="0"
                                      cellpadding="0"
                                      cellspacing="0"
                                      width="100%"
                                      style="max-width: 600px"
                                  >
                                      <!-- start permission -->
                                      <tr>
                                          <td
                                              align="center"
                                              bgcolor="#e9ecef"
                                              style="
                                                  padding: 12px 24px!important;
                                                  font-family: "Source Sans Pro", Helvetica,
                                                      Arial, sans-serif;
                                                  font-size: 14px;
                                                  line-height: 20px;
                                                  color: #666;
                                              "
                                          >
                                              <p style="margin: 0">
                                                  Recibiste este correo porque recibimos una
                                                  solicitud de registro para tu cuenta. Si no
                                                  solicitaste el registro, puedes eliminar
                                                  este correo de manera segura.
                                              </p>
                                          </td>
                                      </tr>
                                      <!-- end permission -->

                                  </table>
                                  <!--[if (gte mso 9)|(IE)]>
                      </td>
                      </tr>
                      </table>
                      <![endif]-->
                              </td>
                          </tr>
                          <!-- end footer -->
                      </table>
                      <!-- end body -->
                  </body>
              </html>
              
        ';

          $mail->isHTML(true);
          $mail->send();
      } catch (\Throwable $th) {
          //throw $th;
      }

    }

    private function envioCorreoAdmin($data)
    {
        $generales = General::first();
        $emailadmin = $generales->email;
        $appUrl = env('APP_URL');
        $name = 'Administrador';
        $mensaje = "Nueva suscriptor - Redconex";
        $mail = EmailConfig::config($name, $mensaje);
      
        $baseUrl = 'https://' . $_SERVER['HTTP_HOST'] . '/mail';
        $baseUrllink = 'https://' . $_SERVER['HTTP_HOST'] . '/';
      

        try {
            $mail->addAddress($emailadmin);
            $mail->Body =
                '<html lang="en">
                <head>
                  <meta charset="UTF-8" />
                  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                  <title>Dimensión Lider</title>
                  <link rel="preconnect" href="https://fonts.googleapis.com" />
                  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
                  <link
                    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
                    rel="stylesheet"
                  />
                  <style>
                    * {
                      margin: 0;
                      padding: 0;
                      box-sizing: border-box;
                    }
                  </style>
                </head>
                <body>
                  <main>
                    <table
                      style="
                        width: 600px;
                        margin: 0 auto;
                        text-align: center;
                        background-image: url(' .
                              $appUrl .
                              '/mail/fondo.png);
                        background-repeat: no-repeat;
                        background-position: center;
                        background-size: cover;
                      "
                    >
                      <thead>
                        <tr>
                          <th
                            style="
                              display: flex;
                              flex-direction: row;
                              justify-content: center;
                              align-items: center;
                              margin-top: 40px;
                              padding: 0 200px;
                            "
                          >
                              <a href="' .
                              $appUrl .
                              '" target="_blank" style="text-align:center" ><img src="' .
                              $appUrl .
                              '/mail/logo.png" alt="hpi" /></a>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <p
                              style="
                                color: #ffffff;
                                font-size: 40px;
                                line-height: normal;
                                font-family: Google Sans;
                                font-weight: bold;
                              "
                            >
                              Nuevo
                              <span style="color: #ffffff">suscriptor</span>
                            </p>
                          </td>
                        </tr>
      
                        <tr>
                          <td>
                            <p
                              style="
                                color: #ffffff;
                                font-weight: 500;
                                font-size: 18px;
                                text-align: center;
                                width: 500px;
                                margin: 0 auto;
                                padding: 20px 0 5px 0;
                                font-family: Google Sans;
                              "
                            >
                              <span style="display: block">Hola ' . $name . '</span>
                            </p>
                          </td>
                        </tr>
                        
                        <tr>
                          <td>
                            <p
                              style="
                                color: #ffffff;
                                font-weight: 500;
                                font-size: 18px;
                                text-align: center;
                                width: 500px;
                                margin: 0 auto;
                                padding: 0px 10px 5px 0px;
                                font-family: Google Sans;
                              "
                            >
                              Tienes un nuevo suscriptor.
                            </p>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <a
                               target="_blank"
                              href="' .
                              $appUrl .
                              '"
                              style="
                                text-decoration: none;
                                background-color: #E29720;
                                color: #21149E;
                                padding: 13px 20px;
                                display: inline-flex;
                                justify-content: center;
                                border-radius: 32px;
                                align-items: center;
                                gap: 10px;
                                font-weight: 600;
                                font-family: Google Sans;
                                font-size: 16px;
                                margin-bottom: 350px;
                              "
                            >
                              <span>Visita nuestra web</span>
                            </a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </main>
                </body>
              </html>
          ';

            $mail->isHTML(true);
            $mail->send();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }



    private function envioCorreoCliente($data)
    { 
        $generales = General::first();
        // $name = $data['full_name'];
        $name = 'Suscriptor';
        $mensaje = 'Gracias por suscribirte - Redconex';
        $mail = EmailConfig::config($name, $mensaje);
        $appUrl = env('APP_URL');
        $baseUrl = 'https://' . $_SERVER['HTTP_HOST'] . '/mail';
        $baseUrllink = 'https://' . $_SERVER['HTTP_HOST'] . '/';      
       
     

        try {
            $mail->addAddress($data['email']);
            $mail->Body =
                '<html lang="en">
                <head>
                  <meta charset="UTF-8" />
                  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                  <title>Dimensión Lider</title>
                  <link rel="preconnect" href="https://fonts.googleapis.com" />
                  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
                  <link
                    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
                    rel="stylesheet"
                  />
                  <style>
                    * {
                      margin: 0;
                      padding: 0;
                      box-sizing: border-box;
                    }
                  </style>
                </head>
                <body>
                  <main>
                    <table
                      style="
                        width: 600px;
                        margin: 0 auto;
                        text-align: center;
                        background-image: url(' .
                              $appUrl .
                              '/mail/fondo.png);
                        background-repeat: no-repeat;
                        background-position: center;
                        background-size: cover;
                      "
                    >
                      <thead>
                        <tr>
                          <th
                            style="
                              display: flex;
                              flex-direction: row;
                              justify-content: center;
                              align-items: center;
                              margin-top: 40px;
                              padding: 0 200px;
                            "
                          >
                              <a href="' .
                              $appUrl .
                              '" target="_blank" style="text-align:center" ><img src="' .
                              $appUrl .
                              '/mail/logo.png" alt="hpi" /></a>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <p
                              style="
                                color: #ffffff;
                                font-size: 40px;
                                line-height: normal;
                                font-family: Google Sans;
                                font-weight: bold;
                              "
                            >
                              ¡Gracias
                              <span style="color: #ffffff">por escribirnos!</span>
                            </p>
                          </td>
                        </tr>
      
                        <tr>
                          <td>
                            <p
                              style="
                                color: #ffffff;
                                font-weight: 500;
                                font-size: 18px;
                                text-align: center;
                                width: 500px;
                                margin: 0 auto;
                                padding: 20px 0 5px 0;
                                font-family: Google Sans;
                              "
                            >
                              <span style="display: block">Hola ' . $name . '</span>
                            </p>
                          </td>
                        </tr>
                        
                        <tr>
                          <td>
                            <p
                              style="
                                color: #ffffff;
                                font-weight: 500;
                                font-size: 18px;
                                text-align: center;
                                width: 500px;
                                margin: 0 auto;
                                padding: 0px 10px 5px 0px;
                                font-family: Google Sans;
                              "
                            >
                              Estaras enterado de nuestras promociones.
                            </p>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <a
                               target="_blank"
                              href="' .
                              $appUrl .
                              '"
                              style="
                                text-decoration: none;
                                background-color: #E29720;
                                color: #21149E;
                                padding: 13px 20px;
                                display: inline-flex;
                                justify-content: center;
                                border-radius: 32px;
                                align-items: center;
                                gap: 10px;
                                font-weight: 600;
                                font-family: Google Sans;
                                font-size: 16px;
                                margin-bottom: 350px;
                              "
                            >
                              <span>Visita nuestra web</span>
                            </a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </main>
                </body>
              </html>';
            $mail->isHTML(true);
            $mail->send();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    
}
