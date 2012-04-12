/* Author:
    Nizar Khalife Iglesias
*/


APPBOILERPLATEBUNDLE = {
    // !Common
    common: {
        init: function()
        {
            // application-wide code
        }
    },  // End common

    // !Controller
    appboilerplate: {
        init: function()
        {
            // controller-wide code
        },

        hello: function()
        {
            // action-specific code
            alert ($('h1').text());
        }
    }  // End controller
};  // End SITENAME


// !UTIL
UTIL = {
    controller: "",
    action:     "",

    exec: function (controller, action)
    {
        var ns     = APPBOILERPLATEBUNDLE,
            action = (action === undefined) ? "init" : action;

        if (controller !== "" && ns[controller] && typeof ns[controller][action] == "function") {
            ns[controller][action]();
        }
    },

    init: function()
    {
        var body        = document.body;
        UTIL.controller = body.getAttribute ("data-controller"),
        UTIL.action     = body.getAttribute ("data-action");

        UTIL.exec ("common");
        UTIL.exec (UTIL.controller);
        UTIL.exec (UTIL.controller, UTIL.action);
    }
};  // End UTIL


$(document).ready (UTIL.init);
