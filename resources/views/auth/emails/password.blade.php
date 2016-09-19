@extends('layouts.email.password')
@section('title', '- Recuperação de Senha')
@section('content')
<table align="center" cellpadding="0" cellspacing="0" class="container-for-gmail-android" width="100%">
    <tr>
        <td align="center" valign="top" width="100%" style="background-color: #f7f7f7; font-family: 'Oxygen', 'Helvetica Neue', 'Arial', 'sans-serif' !important; padding: 20px 0 30px;" class="content-padding">
            <center>
                <table cellspacing="0" cellpadding="0" width="80%" class="w320">
                    <tr>
                        <td class="header-md" style="font-family: 'Oxygen', 'Helvetica Neue', 'Arial', 'sans-serif' !important; font-size: 32px; font-weight: 700; line-height: normal; padding: 35px 0 0; color: #4d4d4d;">
                            Recuperação de Senha
                        </td>
                    </tr>
                    <tr>
                        <td class="free-text" style="width: 80% !important; padding: 10px 60px 0px;">
                            Esse e-mail está sendo enviado para a redefinição da senha da conta com email {{ Auth::user()->getEmailForPasswordReset() }}, se você não é dono desse e-mail ou não solicitou a redefinição de senha, por favor, entre em contato.
                        </td>
                    </tr>
                    <tr>
                        <td class="mini-block-container">
                            <table cellspacing="0" cellpadding="0" width="100%" style="border-collapse:separate !important;">
                                <tr>
                                    <td class="mini-block">
                                        <table cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td class="button" style="padding: 40px 0px;">
                                                    <div>
                                                        <!--[if mso]>
                                                        <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://" style="height:45px;v-text-anchor:middle;width:155px;" arcsize="15%" strokecolor="#ffffff" fillcolor="#4a89dc">
                                                            <w:anchorlock/>
                                                            <center style="color:#ffffff;font-family:Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;">Shop Now</center>
                                                        </v:roundrect>
                                                        <![endif]--><a class="button-mobile" href="{{ $link = url('password/reset', $token) . '?email=' . urlencode(Auth::user()->getEmailForPasswordReset()) }}"
                                                            style="background-color:#4a89dc;border-radius:5px;color:#ffffff;display:inline-block;font-family:'Cabin', Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;line-height:45px;text-align:center;text-decoration:none;width:250px;-webkit-text-size-adjust:none;mso-hide:all;">Clique aqui para redefinir</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-bottom: 30px; padding-top: 10px;">
                                                    Se não conseguir clicar no botão, copie e cole o link: {{ $link }}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </center>
        </td>
    </tr>
    <tr>
        <td align="center" valign="top" width="100%" style="background-color: #f7f7f7; height: 100px;">
            <center>
                <table cellspacing="0" cellpadding="0" width="600" class="w320">
                    <tr>
                        <td style="padding: 25px 0 25px">
                            <strong>Paradise City RPG</strong><br />
                            www.paradisedevs.com.br
                        </td>
                    </tr>
                </table>
            </center>
        </td>
    </tr>
</table>
@endsection
