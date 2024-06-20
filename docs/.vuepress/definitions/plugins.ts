import { markdownContainerPlugin } from "@vuepress/plugin-markdown-container";
import { componentsPlugin } from "vuepress-plugin-components";

import MdDefinePlugin from "vuepress-plugin-markdown-define2";

export const plugins = [
  markdownContainerPlugin({
    type: "tip",
  }),
  componentsPlugin({
    components: ["VPCard", "FontIcon"],
    componentOptions: {
      fontIcon: {
        assets: "fontawesome-with-brands",
        prefix: "fa-brands fa-",
      },
    },
  }),
  MdDefinePlugin({
    GooglePlay: "https://play-lh.googleusercontent.com",
    __var: {},
  }),
];
