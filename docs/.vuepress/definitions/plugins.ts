import { markdownContainerPlugin } from "@vuepress/plugin-markdown-container";
import { componentsPlugin } from "vuepress-plugin-components";

export const plugins = [
  markdownContainerPlugin({
    type: "tip",
  }),
  componentsPlugin({
    components: [
      "VPCard"
    ],
  })
];
