import {defineConfig} from 'vitepress'
import markdownItTextualUml from 'markdown-it-textual-uml';
import {withSidebar} from 'vitepress-sidebar';


const vitePressSidebarOptions = {
    // VitePress Sidebar's options here...
    documentRootPath: '/docs',
    collapsed: false,
    capitalizeFirst: true,
    useTitleFromFileHeading: true,
    useTitleFromFrontmatter: true,
    useFolderTitleFromIndexFile: true,
    useFolderLinkFromIndexFile: true,
    sortMenusByFrontmatterOrder: true,
};

// https://vitepress.dev/reference/site-config
export default defineConfig(withSidebar({
    title: "人情账",
    description: "A VitePress Site",
    themeConfig: {
        // https://vitepress.dev/reference/default-theme-config
        nav: [
            {text: '首页', link: '/'},
            {text: 'Examples', link: '/markdown-examples'}
        ],

        sidebar: [
            {
                text: 'Examples',
                items: [
                    {text: 'Markdown Examples', link: '/markdown-examples'},
                    {text: 'Runtime API Examples', link: '/api-examples'}
                ]
            }
        ],

        socialLinks: [
            {icon: 'github', link: 'https://github.com/vuejs/vitepress'}
        ]
    },
    markdown: {
        config(md) {
            md.use(markdownItTextualUml);
        },
        image: {
            // image lazy loading is disabled by default
            lazyLoading: true
        }
    }
}, vitePressSidebarOptions))
