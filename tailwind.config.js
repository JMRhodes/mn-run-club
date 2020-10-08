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
                "bg-orange-std": "#FF7A4F"
            }
        },
        colors: {
            orange: "#FFCC00",
            gray: {
                "100": "#f5f5f5",
                "200": "#eeeeee",
                "300": "#e0e0e0",
                "400": "#bdbdbd",
                "500": "#9e9e9e",
                "600": "#757575",
                "700": "#616161",
                "800": "#424242",
                "900": "#212121"
            }
        }
    },

    variants: {
        opacity: ["responsive", "hover", "focus", "disabled"]
    },

    plugins: [require("@tailwindcss/ui")]
};
