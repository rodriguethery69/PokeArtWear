Orejime.init({
  elementID: "orejime",
  //appElement: "#app",
  cookieName: "orejime",
  cookieExpiresAfterDays: 365,
<<<<<<< HEAD
  privacyPolicy: "/cookies/mentions-legales.php",
=======
  privacyPolicy: "/mentions-legales.html",
>>>>>>> 2e41f66714da6754df8a30aa904c313af0370c7a
  default: !0,
  mustConsent: !0,
  mustNotice: !1,
  implicitConsent: !1,
  lang: "fr",
  logo: !0,
  debug: !1,
  translations: {
    fr: {
      consentModal: {
        title: "",
        description:
          "Nous utilisons les cookies afin de fournir les services et fonctionnalités proposés sur notre site et d’améliorer l’expérience de nos utilisateurs. Les cookies sont des données qui sont téléchargées ou stockées sur votre ordinateur ou sur tout autre appareil. Si vous acceptez l’utilisation des cookies, vous pourrez toujours la désactiver ultérieurement. Si vous supprimez ou désactivez nos cookies, vous pourriez rencontrer des interruptions ou des problèmes d’accès au site.",
      },
      consentNotice: {
        title: "Politique des cookies",
      },
      purposes: {
        analytics: "Analyse",
        security: "Sécurité",
        social_media: "Média Social",
        Essential: "Essentiel",
      },
    },
  },
  apps: [
    {
      name: "google-tag-manager",
      title: "Google Tag Manager",
      cookies: [
        "_ga",
        "_gat",
        "_gid",
        "__utma",
        "__utmb",
        "__utmc",
        "__utmt",
        "__utmz",
      ],
      purposes: ["analytics"],
      required: !1,
      optOut: !1,
      default: !0,
      onlyOnce: !0,
    },
    {
      name: "essentiel",
      title: "Essentiel",
      cookies: ["Essentiel"],
      purposes: ["Essential"],
      required: !0,
      optOut: !1,
      default: !0,
      onlyOnce: !0,
    },

    {
      name: "instagram",
      title: "Instagram",
      cookies: [
        ["csrftoken", ".instagram.com"],
        ["mid", ".instagram.com"],
        ["ds_user_id", ".instagram.com"],
        ["sessionid", ".instagram.com"],
        ["rur", ".instagram.com"],
        ["urlgen", ".instagram.com"],
      ],
      purposes: ["analytics", "social_media"],
      required: !1,
      optOut: !1,
      default: !0,
      onlyOnce: !0,
    },
<<<<<<< HEAD
=======

    {
      name: "welcometothejungle",
      title: "Welcome to the Jungle",
      cookies: [
        ["_BEAMER_FIRST_VISIT_lXMXoTfb15511", ".welcometothejungle.com"],
        ["_BEAMER_USER_ID_lXMXoTfb15511", ".welcometothejungle.com"],
        ["_sp_id.407f", ".welcometothejungle.com"],
      ],
      purposes: ["analytics", "security"],
      required: !1,
      optOut: !1,
      default: !0,
      onlyOnce: !0,
    },
    {
      name: "simplon.co",
      title: "Simplon.co",
      cookies: [
        ["XSRF-TOKEN", ".simplon.co"],
        ["orejime", ".simplon.co"],
        ["simplonco_session", ".simplon.co"],
      ],
      purposes: ["security"],
      required: !0,
      optOut: !1,
      default: !0,
      onlyOnce: !0,
    },
>>>>>>> 2e41f66714da6754df8a30aa904c313af0370c7a
  ],
});