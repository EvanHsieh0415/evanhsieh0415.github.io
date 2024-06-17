import { viteBundler } from "@vuepress/bundler-vite";
import { defineUserConfig } from "vuepress";

import { theme } from "./definitions/theme";
import { plugins } from "./definitions/plugins";

export default defineUserConfig({
  bundler: viteBundler(),
  head: [["meta", { charset: "utf-8" }]],
  theme,
  plugins,

  locales: {
    "/": {
      lang: "en-US",
      title: "EvanHsieh's Personal Website",
    },
    "/zh-tw/": {
      lang: "zh-TW",
      title: "EvanHsieh0415 的個人網站",
    },
  },
});
