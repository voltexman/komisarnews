/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./vendor/wireui/wireui/src/*.php",
        "./vendor/wireui/wireui/ts/**/*.ts",
        "./vendor/wireui/wireui/src/WireUi/**/*.php",
        "./vendor/wireui/wireui/src/Components/**/*.php",
    ],
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                // transparent: "transparent",
                // white: "#ffffff",
                // black: "#000000",
                warning: "#ffcc00",
                red: "#ff0000",
                max: {
                    orange: "#c28566",
                    white: "#f9eee1",
                    black: "#272121",
                    dark: "#6d574a",
                    light: "#fef1e9",
                    medium: "#49403b",
                    text: "#B19A81",
                    soft: "#9e8c80",
                },
            },
            backgroundImage: {
                barber: "url('/public/images/barber.png')",
            },
            keyframes: {
                "slide-top-to-bottom": {
                    "0%": { objectPosition: "top" },
                    "100%": { objectPosition: "bottom" },
                },
                "slide-bottom-to-top": {
                    "0%": { objectPosition: "bottom" },
                    "100%": { objectPosition: "top" },
                },
                ricochet: {
                    "0%": { objectPosition: "left" },
                    "100%": { objectPosition: "right" },
                },
                "scale-in": {
                    "0%": { scale: "1" },
                    "100%": { scale: "1.5" },
                },
                "scale-out": {
                    "0%": { scale: "1.5" },
                    "100%": { scale: "1" },
                },
                "jumping-up": {
                    "0%": { transform: "translateY(0px)" },
                    "100%": { transform: "translateY(-20px)" },
                },
                "jumping-down": {
                    "0%": { transform: "translateY(0px)" },
                    "100%": { transform: "translateY(20px)" },
                },
            },
            animation: {
                "slide-top-to-bottom":
                    "slide-top-to-bottom 8s linear infinite alternate",
                "slide-bottom-to-top":
                    "slide-bottom-to-top 8s linear infinite alternate",
                ricochet: "ricochet 25s linear alternate infinite",
                "jumping-down":
                    "jumping-down 2s ease-in-out alternate infinite",
                "jumping-up": "jumping-up 2s ease-in-out alternate infinite",
                "scale-in": "scale-in 10s ease-in-out alternate infinite",
                "scale-out": "scale-out 10s ease-in-out alternate infinite",
            },
        },
        fontFamily: {
            sans: ["Nunito", "sans-serif"],
        },
        container: {
            padding: "1rem",
            center: true,
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("./vendor/wireui/wireui/tailwind.config.js"),
    ],
};
