/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {
            colors: {
                white: "#ffffff",
                mineshaft: "#3a3a3a",
                cerulean50: "#40a8e6",
            },
            fontFamily: {
                sans: [
                    "Rubik",
                    "Rubik Fallback",
                    "ui-sans-serif",
                    "system-ui",
                    "-apple-system",
                    "BlinkMacSystemFont",
                    "Segoe UI",
                    "Roboto",
                    "Helvetica Neue",
                    "Arial",
                    "Noto Sans",
                    "sans-serif",
                    "Apple Color Emoji",
                    "Segoe UI Emoji",
                    "Segoe UI Symbol",
                    "Noto Color Emoji",
                ],
            },
            fontSize: {
                body: "0.875rem",
            },
            maxWidth: {
                "screen-sm": "480px",
            },
        },
    },
    plugins: [],
};
