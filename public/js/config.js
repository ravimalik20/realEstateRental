
require.config({     
        
    baseUrl: "/js/lib",   

    paths: {

        // Twitter Bootstrap
        bootstrap: [
            "//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min",
            "/bootstrap/twitter/js/bootstrap.min"
        ],

        // TouchSpin
        bsTouchSpin: "jquery.bootstrap-touchspin.min",       

        // jQuery
        jquery: [
            "//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min",
            "jquery"
        ],                

        // Knockout
        knockout: [
            "//cdnjs.cloudflare.com/ajax/libs/knockout/3.2.0/knockout-min",
            "knockout"
        ],

        // Knockout Mapping
        koMapping: [            
            "//cdnjs.cloudflare.com/ajax/libs/knockout.mapping/2.4.1/knockout.mapping.min",
            "knockout.mapping"
        ],      

        koValidation: "knockout.validation.min",
        koValidationUi: "knockout.validation.ui",

        // MomentJS
        moment: [
            "//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.min",
            "moment-with-locales.min"
        ],

        // Google Charts
        googleCharts: [
            "https://www.google.com/jsapi"
        ],

        // Google reCaptcha
        googleReCaptcha: [
            "https://www.google.com/recaptcha/api"
        ],

        // History
        history: "jquery.history",
        
        // Folder Aliases
        app: "../app",
        domain: "../app/Domain",
        viewModel: "../app/ViewModels",
        koBindingHandler: "../app/KoBindingHandlers",
        koComponent: "../app/KoComponents",
        koExtender: "../app/KoExtenders",
        koValidationRule: "../app/KoValidationRules",        
        helper: "../app/Helpers",
        jqueryFileUpload: "/jQueryFileUpload/js"
    },

    // Load timeout for scripts
    waitSeconds: 15,

    config: {
        moment: { noGlobal: true }        
    },

    // Dependency Shims
    shim: {

        bootstrap: {
            deps: ["jquery"]
        },       

        "jasny-bootstrap": {
            deps: ["jquery"]
        },

        bsTouchSpin: {
            deps: ["jquery"]
        },        
        
        koMapping: {
            deps: ["knockout"]           
        },

        koValidation: {
            deps: ["knockout"]            
        }        
    },    
    
});
