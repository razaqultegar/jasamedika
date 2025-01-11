/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {
            colors: {
                white: "#ffffff",
                mercury: "#e8e8e8",
                coal: "#f2f3f4",
                skull: "#f8f8f8",
                mineshaft: "#3a3a3a",
                onyx: "#6a6a6a",
                cerulean: {
                    10: "#e6f5fb",
                    50: "#40a8e6",
                },
                clrPrimary: "#00aeef",
                clrSubText: "#989898",
                clrField05: "#f7f7f7",
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
                xs: "0.625rem",
                sm: "0.75rem",
                body: "0.875rem",
            },
            maxWidth: {
                "screen-sm": "480px",
                480: "480px",
            },
            width: {
                480: "480px",
            },
            height: {
                header: "60px",
            },
            zIndex: {
                1: "1",
            },
        },
    },
    plugins: [],
};
