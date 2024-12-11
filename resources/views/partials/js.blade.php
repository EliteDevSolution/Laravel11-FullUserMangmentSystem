<!-- Vendor js -->
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>

@stack('js')

<!-- App js-->
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/libs/jquery-mask-plugin/jquery.mask.min.js') }}"></script>
<script src="{{ asset('assets/libs/autonumeric/autoNumeric-min.js') }}"></script>
<script src="{{ asset('assets/plugin/lazyload/lazyload.js') }}"></script>
<script src="{{ asset('assets/plugin/blockui/blockUI.js') }}"></script>
<script src="{{ asset('assets/plugin/jquery.cookie.js') }}"></script>
<script src="{{ asset('assets/plugin/jquery-confirm/jquery-confirm.min.js') }}"></script>
<script src="{{ asset('assets/libs/jquery-toast/jquery.toast.min.js') }}"></script>
<script src="{{ asset('assets/libs/toastr/toastr.init.js') }}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ajaxError(function(_event, xhr) {
        if(xhr.status === 401 && xhr.statusText === "Unauthorized")
            location.href = 'login';
    });

    function getBrowserWidth() {
        return Math.max(
            document.body.scrollWidth,
            document.documentElement.scrollWidth,
            document.body.offsetWidth,
            document.documentElement.offsetWidth,
            document.documentElement.clientWidth
        );
    }

    let curUrlPath = window.location.pathname;
    $(document).ready(function()
    {
        $('[data-toggle="select2"]').select2();
        $('[data-toggle="input-mask"]').each(function(a,e){var t=$(e).data("maskFormat"),n=$(e).data("reverse");null!=n?$(e).mask(t,{reverse:n}):$(e).mask(t)})});
        $(function(a){a(".autonumber").autoNumeric("init");
        $("img").lazyload();
        $(".alert").fadeTo(4000, 500).slideUp(500, function(){
            $(".alert").slideUp(500);
        });

        if(localStorage.getItem('is_sidebar_expand') === 'close')
            $('#btn_sidebar_expand').click();
        else if(localStorage.getItem('is_sidebar_expand') !== 'open')
        {
            localStorage.setItem('is_sidebar_expand', 'open');
        }

        $('#btn_sidebar_expand').click(function() {
            if(localStorage.getItem('is_sidebar_expand') === 'open')
                localStorage.setItem('is_sidebar_expand', 'close');
            else
                localStorage.setItem('is_sidebar_expand', 'open');
        });

        $('button[data-dismiss=no-dismiss-alert]').on('click', function(){
            $(this).parent().remove();
        });

        //Check to see if the window is top if not then display button
        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.scrollToTop').fadeIn();
            } else {
                $('.scrollToTop').fadeOut();
            }
        });

        //Click event to scroll to top
        $('.scrollToTop').click(function(){
            $('html, body').animate({scrollTop : 0},800);
            return false;
        });
    })

    let UIBlock = (type) => {
        $.blockUI({ baseZ: 2000, message: `
        <div id="${type}">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>` });
    }

    let elementBlock = (type, elements) => {
        $(elements).block({
            overlayCSS: {
                opacity: 0.15
            },
            message: `
            <div id="${type}">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>`
        });
    }

    let elementUnBlock = (elements) => {
        $(elements).unblock();
    }

    let UnBlockUi = () => {
        $.unblockUI();
    }

    let isWeekend = (dateValue) => {
        var dt = new Date(dateValue);
        return dt.getDay() == 6 || dt.getDay() == 0;
    }

    let formatDate = (dateValue) => {
        var d = new Date(dateValue),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();
        if (month.length < 2)
            month = '0' + month;
        if (day.length < 2)
            day = '0' + day;

        return [year, month, day].join('-');
    }

    //Browser scroll visible
    let hasScrollBar = () => {
        if($(document).height() > $(window).height())
            $('.footer-bottom').css('position', 'unset');
        else
            $('.footer-bottom').css('position', 'absolute');
    }

    let isConfirm = (form) => {
        event.preventDefault();
        $.confirm({
            title: "{{ __('global.alert') }}",
            content: "{{ __('global.areYouSure') }}",
            draggable: true,
            type: 'red',
            closeIcon: false,
            icon: 'fa fa-exclamation-triangle',
            buttons: {
                somethingElse: {
                    text: "{{ __('global.yesDelete') }}",
                    btnClass: 'btn-red',
                    keys: ['shift'],
                    action: function(){
                        $(form).submit();                    }
                },
                cancel: {
                    text: "{{ __('global.cancel') }}",
                    action: function(){
                        return true;
                    }
                },
            }
        });
    }

    function beforePDFPrinting() {
        var cc = document.getElementsByTagName("svg");
        for (i = 0; i < cc.length; i++) {
            var svg = cc[i];
            var rect = svg.getBoundingClientRect();
            var img = document.createElement("img");
            img.src = 'data:image/svg+xml;base64,' + btoa(unescape(encodeURIComponent(svg.outerHTML)));
            //img.style = "position:absolute";
            img.className = "remove-after-print";
            svg.parentNode.insertBefore(img, svg);
        }
    }

    function afterPDFPrinting() {
        $(".remove-after-print").remove();
    }

    //Print Invoice
    let printInvoice = (id) => {
        //window.open("{{ url('admin/orders/invoice') }}" + '/' + id,'_blank',`left=${screen.availWidth/5},top=50,height=800,width=1000,'directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no`);
        location.href = "{{ url('admin/orders/preview_invoice') }}" + '/' + id;
    };

    function printPreview(data) {
        var type = 'application/pdf';
        let blob = null;
        const blobURL = URL.createObjectURL( pdfBlobConversion(data, 'application/pdf'));
        const theWindow = window.open(blobURL);
        //const theDoc = window.document;
        //const theScript = document.createElement('script');
        // function injectThis() {
        //     window.print();
        // }
        //theScript.innerHTML = 'window.onload = ${injectThis.toString()};';
        //theDoc.body.appendChild(theScript);
    }
    //converts base64 to blob type for windows
    function pdfBlobConversion(b64Data, contentType) {
        contentType = contentType || '';
        var sliceSize = 512;
        b64Data = b64Data.replace(/^[^,]+,/, '');
        b64Data = b64Data.replace(/\s/g, '');
        var byteCharacters = window.atob(b64Data);
        var byteArrays = [];

        for ( var offset = 0; offset < byteCharacters.length; offset = offset + sliceSize ) {
            var slice = byteCharacters.slice(offset, offset + sliceSize);

            var byteNumbers = new Array(slice.length);
            for (var i = 0; i < slice.length; i++) {
                byteNumbers[i] = slice.charCodeAt(i);
            }
            var byteArray = new Uint8Array(byteNumbers);
            byteArrays.push(byteArray);
        }

        var blob = new Blob(byteArrays, { type: contentType });
        return blob;
    }

    function getSelectedRowsIds(identifier) {
        let selectedIds = [];
        $( `${identifier}>tbody tr input:checkbox` ).each(function() {
            if($(this).is(':checked')) selectedIds.push($(this).parent().parent().attr('data-id'));
        });
        return selectedIds;
    }

    function closePopover() {
        $('[data-toggle="popover"]').not(this).popover('hide');
    }

    function historyBack(url) {
        if(window.history.length === 1)
        {
            location.href = url;
        } else
        {
            history.back(1);
        }
    }

    // Password field toggle Password show and hide
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    togglePassword?.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye / eye slash icon
        type == 'text' ? $(this).attr('class', 'fe-eye vis-password') : $(this).attr('class', 'fe-eye-off vis-password');
    });

    function ignorRouteDuplicate(route) {
        $("#side-menu a").each(function()
            {
                var linkUrl = this.href;
                var curUrl=window.location.href.split(/[?#]/)[0];
                if(!curUrl.includes('test_page') && linkUrl.includes(route))
                {
                    $(this).addClass("active");
                    $(this).parent().addClass("active");
                    $(this).parent().parent().addClass("in");
                    $(this).parent().parent().prev().addClass("active");
                    $(this).parent().parent().parent().addClass("active");
                    $(this).parent().parent().parent().parent().addClass("in");
                    $(this).parent().parent().parent().parent().parent().addClass("active");
                }
            }
        );
    }

</script>