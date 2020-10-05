const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    purge: [
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans]
            },
            borderRadius: {
                lg: "1.5rem",
                full: "9999px"
            },
            colors: {
                "bg-green-p": "#55efc4",
                "bg-green-s": "#00b894",
                red: {
                    100: "#fab1a0",
                    200: "#fab1a0",
                    300: "#ff7675",
                    400: "#ff7675",
                    500: "#e17055",
                    600: "#e17055",
                    700: "#d63031",
                    800: "#d63031",
                    900: "#d63031"
                },
                yellow: {
                    100: "#ffeaa7",
                    200: "#ffeaa7",
                    300: "#ffeaa7",
                    400: "#ffeaa7",
                    500: "#ffeaa7",
                    600: "#fdcb6e",
                    700: "#fdcb6e",
                    800: "#fdcb6e",
                    900: "#fdcb6e"
                },
                teal: {
                    100: "#81ecec",
                    200: "#81ecec",
                    300: "#81ecec",
                    400: "#81ecec",
                    500: "#81ecec",
                    600: "#00cec9",
                    700: "#00cec9",
                    800: "#00cec9",
                    900: "#00cec9"
                },
                blue: {
                    100: "#74b9ff",
                    200: "#74b9ff",
                    300: "#0984e3",
                    400: "#0984e3",
                    500: "#a29bfe",
                    600: "#a29bfe",
                    700: "#6c5ce7",
                    800: "#6c5ce7",
                    900: "#6c5ce7"
                }
            }
        }
    },

    variants: {
        opacity: ["responsive", "hover", "focus", "disabled"]
    },

    plugins: [require("@tailwindcss/ui")]
};
