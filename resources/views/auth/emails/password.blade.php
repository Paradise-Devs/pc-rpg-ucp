@extends('layouts.email.password')
@section('title', '- Recuperação de Senha')
@section('content')
<table align="center" cellpadding="0" cellspacing="0" class="container-for-gmail-android" width="100%">
    <tr>
        <td align="left" valign="top" width="100%" style="background:repeat-x url(../../../../../s3.amazonaws.com/swu-filepicker/4E687TRe69Ld95IDWyEg_bg_top_02.jpg) #ffffff;">
            <center>
                <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ffffff" background="../../../../../s3.amazonaws.com/swu-filepicker/4E687TRe69Ld95IDWyEg_bg_top_02.jpg" style="background-color:transparent">
                    <tr>
                        <td width="100%" height="80" valign="top" style="text-align: center; vertical-align:middle;">
                            <!--[if gte mso 9]>
                            <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="mso-width-percent:1000;height:80px; v-text-anchor:middle;">
                                <v:fill type="tile" src="http://s3.amazonaws.com/swu-filepicker/4E687TRe69Ld95IDWyEg_bg_top_02.jpg" color="#ffffff" />
                                <v:textbox inset="0,0,0,0">
                                    <![endif]-->
                                    <center>
                                        <table cellpadding="0" cellspacing="0" width="600" class="w320">
                                            <tr>
                                                <td class="pull-left mobile-header-padding-left" style="vertical-align: middle;">
                                                    <a href="#"><img width="167" height="35" src="img/logo.png" alt="logo"></a>
                                                </td>
                                                <td class="pull-right mobile-header-padding-right" style="color: #4d4d4d;">
                                                    <a href="#"><img width="40" height="47" src="img/social-twitter.png" alt="twitter" /></a>
                                                    <a href="#"><img width="40" height="47" src="img/social-fb.png" alt="facebook" /></a>
                                                    <a href="#"><img width="40" height="47" src="img/social-feed.png" alt="rss" /></a>
                                                </td>
                                            </tr>
                                        </table>
                                    </center>
                                    <!--[if gte mso 9]>
                                </v:textbox>
                            </v:rect>
                            <![endif]-->
                        </td>
                    </tr>
                </table>
            </center>
        </td>
    </tr>
    <tr>
        <td align="center" valign="top" width="100%" style="background-color: #f7f7f7;" class="content-padding">
            <center>
                <table cellspacing="0" cellpadding="0" width="60%" class="w320">
                    <tr>
                        <td class="header-md">
                            Recuperação de Senha
                        </td>
                    </tr>
                    <tr>
                        <td class="free-text">
                            Esse e-mail está sendo enviado para a redefinição da senha da conta com email {{ $user->getEmailForPasswordReset() }}, se você não é dono desse e-mail ou não solicitou a redefinição de senha, por favor, entre em contato.
                        </td>
                    </tr>
                    <tr>
                        <td class="mini-block-container">
                            <table cellspacing="0" cellpadding="0" width="100%" style="border-collapse:separate !important;">
                                <tr>
                                    <td class="mini-block">
                                        <table cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td class="button">
                                                    <div>
                                                        <!--[if mso]>
                                                        <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://" style="height:45px;v-text-anchor:middle;width:155px;" arcsize="15%" strokecolor="#ffffff" fillcolor="#4a89dc">
                                                            <w:anchorlock/>
                                                            <center style="color:#ffffff;font-family:Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;">Shop Now</center>
                                                        </v:roundrect>
                                                        <![endif]--><a class="button-mobile" href="{{ $link = url('password/reset', $token) . '?email=' . urlencode($user->getEmailForPasswordReset()) }}"
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
