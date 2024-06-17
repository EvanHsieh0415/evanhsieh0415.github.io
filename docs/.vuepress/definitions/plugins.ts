import { markdownContainerPlugin } from "@vuepress/plugin-markdown-container";

const plugins = [
  markdownContainerPlugin({
    type: "spoiler",
    before: (info: string) => `<details><summary>${info}</summary>\n`,
    after: (info: string) => "</details>\n",
  }),
];

export default plugins;
