<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>D&A Tech Backend Developer Test - Jason Ruddock</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="theme-color" content="#ffffff">
    <meta name="MobileOptimized" content="320">
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover, target-densitydpi=device-dpi, shrink-to-fit=no">
    <meta name="author" content="https://psdhtml.me">
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i%7COpen+Sans+Condensed:300,700">
    <link rel="preload" as="font" href="styles/icons/icomoon.woff2">
    <link rel="preload" as="script" href="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    <link rel="preload" as="script" href="javascript/scripts.js">
    <link rel="preload" as="script" href="javascript/custom.js">
    <link rel="stylesheet" media="screen" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i%7COpen+Sans+Condensed:300,700">
    <link rel="stylesheet" media="screen" href="styles/screen.css">
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <link rel="manifest" href="manifest.json">
    <link rel="preconnect" href="https://ajax.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="https://ajax.googleapis.com">
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com" crossorigin>
    <meta name="msapplication-config" content="browserconfig.xml">
    <meta property="og:title" content="Highmark">
    <meta property="og:type" content="website">
    <meta property="og:description" content="">
    <meta property="og:site_name" content="Highmark">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta name="twitter:title" content="Highmark">
    <meta name="twitter:description" content="">
    <meta name="twitter:site" content="Highmark">
    <meta name="twitter:card" content="">
    <meta name="twitter:image" content="">
    <script type="application/ld+json">
			[
				{
					"@context": "http://schema.org/",
					"@type": "Organization",
					"url": "",
					"name": "Highmark",
					"legalName": "Highmark",
					"description": "",
					"logo": "",
					"image": "",
					"contactPoint": {
						"@type": "ContactPoint",
						"contactType": "Customer service",
						"telephone": ""
					},
					"address": {
						"@type": "PostalAddress",
						"streetAddress": "",
						"addressLocality": "",
						"addressRegion": "",
						"postalCode": "",
						"addressCountry": ""
					}
				},
				{
					"@context": "http://schema.org",
					"@type": "WebSite",
					"url": "",
					"name": "Highmark",
					"description": "",
					"author": {
						"@type": "Organization",
						"url": "https://psdhtml.me",
						"name": "psdHTML.me",
						"description": "PSD to responsive HTML coding"
					}
				}
			]
		</script>


    <style>
        /* -------------------------------------------

            Name:		Highmark
            Date:		2019/03/01
            Author:		http://psdhtml.me

        ---------------------------------------------  */
        *, :before, :after { margin: 0; padding: 0; box-sizing: border-box; outline-color: var(--cerulean); }

        html { overflow-y: scroll; min-height: 100%; margin: 0 0 1px; font-size: 100.01%; -webkit-tap-highlight-color: transparent; -moz-osx-font-smoothing: grayscale; -webkit-overflow-scrolling: touch; -ms-content-zooming: none; -ms-overflow-style: scrollbar; }
        body { min-height: 100%; background: #fff; font-size: 62.5%; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        @-ms-viewport { width: device-width; }
        @viewport { width: device-width; }


        /*! Theme --------- */
        :root {
            --white: #fff;
            --gray: #8c99a1;
            --coal: #555;
            --honey: #f99e2b;
            --cerulean: #04a6e1;
        }


        /*! Repeatable --------- */
        /* clear */			#content:after, #top:after { content: ""; display: block; clear: both; }
        /* fill */			.link-btn a:before, .link-btn a:after { content: ""; display: block; overflow: hidden; position: absolute; left: 0; top: 0; right: 0; bottom: 0; z-index: -1; text-align: left; text-indent: -3000em; direction: ltr; }
        /* tdu */ 			[data-whatintent="mouse"] a:hover { text-decoration: underline; }
        /* tdn */ 			#root .link-btn a { text-decoration: none; }


        /*! Defaults --------- */
        body, textarea, input, select, option, button { color: var(--coal); font-family: Montserrat, Arial, Helvetica, sans-serif; line-height: 1.2; }
        li, dt, dd, p, figure, th, td, caption, legend, pre { font-size: 1.2em; } li *, dt *, dd *, p *, figure *, th *, td *, legend * { font-size: 1em; }
        ul, ol, dl, p, figure, table, pre, h1, h2, h3, h4, h5, h6, legend { margin-bottom: 15px; }

        h1 { font-size: 3.0em; }
        h2 { font-size: 2.8em; }
        h3 { font-size: 2.6em; }
        h4 { font-size: 2.4em; }
        h5 { font-size: 2.2em; }
        h6 { font-size: 2.0em; }

        a { background: none; color: var(--cerulean); text-decoration: none; cursor: pointer; outline-width: 0; -webkit-text-decoration-skip: objects; } /*---*/ a span { cursor: pointer; }

        ul, ol, dd, blockquote { padding-left: 40px; }


        /*! Layout --------- */
        #root { overflow: hidden; position: relative; width: 100%; min-height: 100vh; padding: 40px; border-bottom: 120px solid var(--honey); }
        #root:before { content: ""; display: block; position: absolute; left: 0; right: 0; top: 0; z-index: 0; height: 295px; }
        #root:before { background: -moz-linear-gradient(top, #88d5f1 0%, #ffffff 100%); background: -webkit-linear-gradient(top, #88d5f1 0%,#ffffff 100%); background: linear-gradient(to bottom, #88d5f1 0%,#ffffff 100%); }
        #top { position: relative; z-index: 2; width: 100%; max-width: 730px; margin: 0 auto; }
        #logo { width: 643px; height: 88px; margin: 0 0 63px -54px; background: url(../images/logo.png) center center no-repeat; background-size: contain; }
        #logo a { display: block; overflow: hidden; width: 100%; height: 100%; text-indent: -3000em; }
        #content { position: relative; z-index: 1; width: 100%; max-width: 730px; margin: 0 auto; }


        /*! Content --------- */
        .lead { display: block; position: relative; padding: 0 0 7px 32px; color: var(--cerulean); font-size: 3em; font-weight: 700; }
        .lead:before { content: ""; display: block; position: absolute; left: 0; top: 0; bottom: 0; width: 4px; background: var(--honey); }
        .lead + .link-btn { margin-top: 66px; }


        /*! Links --------- */
        .link-btn { color: var(--cerulean); font-size: 1.8em; }
        .link-btn a { display: block; overflow: hidden; position: relative; z-index: 4; padding: 9px 24px; font-family: 'Open Sans Condensed', Montserrat, Arial, Helvetica, sans-serif; font-size: 1.4444444444em; font-weight: 700; text-transform: uppercase; text-align: center; letter-spacing: 0.6153846154em; text-indent: .6153846154em; }
        .link-btn a:before { z-index: -2; border-radius: 25px; border: 1px solid var(--gray); }
        .link-btn a:before { background: -moz-linear-gradient(top, #b4c1c9 0%, #fdfdfe 100%); background: -webkit-linear-gradient(top, #b4c1c9 0%,#fdfdfe 100%); background: linear-gradient(to bottom, #b4c1c9 0%,#fdfdfe 100%); }
        .link-btn a:after { left: 11px; right: 11px; top: 4px; bottom: auto; height: 23px; border-radius: 23px; }
        .link-btn a:after { background: -moz-linear-gradient(top, rgba(255,255,255,0.7) 0%, rgba(255,255,255,0) 100%); background: -webkit-linear-gradient(top, rgba(255,255,255,0.7) 0%,rgba(255,255,255,0) 100%); background: linear-gradient(to bottom, rgba(255,255,255,0.7) 0%,rgba(255,255,255,0) 100%); }
        .link-btn span { display: block; padding: 0 0 0 14px; }
        .link-btn span span { padding: 2px 0 0; color: var(--coal); font-size: 0.5555555556em; }



        /*! Helpers --------- */
        .hidden { position: absolute; left: -3000em; top: 0; right: auto; bottom: auto; }
        article, aside, details, dialog, div, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary { display: block; }

        ul ul, ul ol, ol ol, ol ul { margin-bottom: 0; }


        /*! Miscellaneous --------- */
        audio, canvas, iframe, img, svg, video { border-width: 0; vertical-align: middle; }
        audio, canvas, progress, video { display: inline-block; vertical-align: baseline; }
        audio:not([controls]), video[autoplay]:not([muted]) { display: none; }
        svg:not(:root) { overflow: hidden; }

        ::selection { background: var(--cerulean); color: var(--white); text-shadow: none; }
        ::-moz-selection { background: var(--cerulean); color: var(--white); text-shadow: none; }


        /*! Outlines --------- */
        [data-whatinput="keyboard"] a:focus, [data-whatinput="keyboard"] button:focus, [data-whatinput="keyboard"] input:focus, [data-whatinput="keyboard"] select:focus, [data-whatinput="keyboard"] textarea:focus { outline-width: 2px; outline-style: solid; }
        [data-whatintent="mouse"] input:focus, [data-whatintent="mouse"] select:focus, [data-whatintent="mouse"] textarea:focus { outline: none; }


        /*! Flexbox --------- */
        /* flex */ 						.link-btn, #root { display: -moz-box; display: -webkit-box; display: -webkit-flex; display: -ms-flexbox; display: flex; }
        /* direction-col */				#root { -webkit-flex-direction: column; flex-direction: column; }
        /* justify-center */			.link-btn, #root { -webkit-justify-content: center; justify-content: center; }
        /* align-i-center */			.link-btn { -webkit-align-items: center; align-items: center; }


        /* Responsive --------- */
        @media only screen and (max-width: 56.25em) { /* 900 */
            #logo { margin-left: 0; }
        }
        @media only screen and (max-width: 49.375em) { /* 790 */
            #root { padding: 20px; }

            #root { border-width: 0; }
            #logo { width: 100%; height: 13.68vw; margin-bottom: 30px; }

            .lead, h1, h2, h3, h4, h5, h6 { font-size: 2em; }

            .lead { padding-left: 25px; padding-bottom: 5px; }
            .lead:before { width: 3px; }
            .link-btn { text-align: center; }
            .link-btn span { padding-left: 0; }
            .link-btn a + span { padding-top: 14px; }
            .lead + .link-btn { margin-top: 30px; }

            .link-btn { -webkit-flex-direction: column; flex-direction: column; }
        }

    </style>
</head>
<body>
<div id="root">
    <main id="content">
        <p class="lead">Jason Ruddock</p>
        <p class="lead">D&A Technologies Backend Developer Test</p>
        <p>
            <span>All endpoints are under /api, e.g.:</span>
            <span><a href="https://datechdev.jasonruddock.com/api/list_all_users.php?requester_user_id=1">
                    https://datechdev.jasonruddock.com/api/list_all_users.php?requester_user_id=1
            </a>
            </span>
        </p>
    </main>
</div>
<script defer async src="javascript/scripts.js"></script>
</body>
</html>
