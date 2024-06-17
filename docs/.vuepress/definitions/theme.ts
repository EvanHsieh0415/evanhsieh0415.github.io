import { defaultTheme } from "@vuepress/theme-default";

export const theme = defaultTheme({
  logo: "https://avatars.githubusercontent.com/u/74277414",
  logoAlt: "",

  colorMode: "dark",
  colorModeSwitch: true,

  repo: "EvanHsieh0415/evanhsieh0415.github.io",
  editLinkPattern: ":repo/edit/:branch/:path",

  lastUpdated: true,
  contributors: true,

  locales: {
    "/": {
      navbar: [{ text: "Discord", link: "/links/discord.md" }],
    },
    "/zh-tw/": {
      home: "/zh-tw/",
      navbar: [{ text: "Discord", link: "/links/discord.md" }],

      sidebar: [
        { text: "儲存庫", link: "storage/" },
        { text: "實用的連結", link: "useful-links/" },
        { text: "遊戲", link: "games/" },
      ],

      editLinkText: "在 GitHub 編輯此頁面",
      lastUpdatedText: "最後更新",
      contributorsText: "作者",
      backToHome: "返回首頁",
      openInNewWindow: "在新視窗中開啟",
      toggleColorMode: "切換色彩模式",
      toggleSidebar: "切換選單列",
      tip: "提示",
      warning: "注意",
      danger: "警告",
      notFound: ["這個頁面不存在"],
      selectLanguageText: "選擇語言",
    },
  },
});
