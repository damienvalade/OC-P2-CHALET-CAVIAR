wplj(document).ready(function () {
        wplj._realtyna.lightbox.on('beforeOpen', function () {
            wplj.fn.visible = function () {
                return this.css('visibility', 'visible');
            };
        });
        wplj(".wpl-profile-listing-wp .wpl_profile_container ul li.fax").wrapInner("<a></a>");

});