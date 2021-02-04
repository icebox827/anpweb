    /* #Check if element exists
    ================================================== */
    $.fn.exists = function () {
        return $(this).length > 0;
    };

    /* !- Check if element is loaded */
    $.fn.loaded = function (callback, jointCallback, ensureCallback) {
        var len = this.length;
        if (len > 0) {
            return this.each(function () {
				var	el		= this,
					$el		= $(el);

				$el.on("load.dt", function(event) {
                    $(this).off("load.dt");
                    if (typeof callback == "function") {
                        callback.call(this);
                    }
                    if (--len <= 0 && (typeof jointCallback == "function")) {
                        jointCallback.call(this);
                    }
                });

                if (!(!el.complete || el.complete === undefined)) {
                    $el.trigger("load.dt")
                }
            });
        } else if (ensureCallback) {
            if (typeof jointCallback == "function") {
                jointCallback.call(this);
            }
            return this;
        }
    };