<script src="/scripts/plugins/jquery.min.js"></script>
<script src="/scripts/plugins/bootstrap.bundle.min.js"></script>
<script src="/scripts/plugins/aos.js"></script>
<script src="/scripts/plugins/swiper-bundle.min.js"></script>  
<script src="/scripts/plugins/ScrollMagic.min.js"></script>  
<script src="/scripts/plugins/greensock/TweenMax.min.js"></script>  
<script src="https://unpkg.co/gsap@3/dist/gsap.min.js"></script> 
<script src="/scripts/plugins/greensock/animation.gsap.js"></script> 
<script src="https://unpkg.com/gsap@3/dist/ScrollTrigger.min.js "></script> 
<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js"></script>
<script src="/scripts/default/ui.js"></script>


<script src="/scripts/jquery.validate.js"></script>
<script src="/scripts/ajax.js"></script>



<script>
    $(function () {

        var reloadImg = function(dImg) {
            var sOldUrl = dImg.src;
            var sNewUrl = sOldUrl + "?rnd=" + Math.random();
            dImg.src = sNewUrl;
        };

        var dReloadLink = document.getElementById("reload-img");
        var dImg = document.getElementById("rand-img");

        dReloadLink.onclick = function(e) {
            reloadImg(dImg);
            if(e) e.preventDefault();
            return false;
        };




        $('#postForm').validate({
            debug: true,
            errorElement: 'em',
            ignore: '.ignore',

            rules: {
                names:{
                    required: true,
                },
                tel: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },

                VerificationCode:{
                    required: true,
                    remote: {
                        url: 'check-code.php',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            VerificationCode: function() {
                                return $('#VerificationCode').val();
                            }
                        }
                    }
                },
            },

            messages: {
                names: "",
                tel: "",
                email: "",
                VerificationCode: "",
            },

            success: function(element) {

            },

            errorPlacement: function (error, element) {
                console.log($(element).attr('id'));
            },

            highlight: function(element) {
                $(element).parents('.form-group').css({'border': '1px solid #ff0000'});
                //$(element).parents(".form-field").addClass("error");
            },

            unhighlight: function(element) {
                $(element).parents('.form-group').css({'border': '1px solid #ffffff'});
                //$(element).parents(".form-field").removeClass("error");
            },

            submitHandler: function() {
                $(':input[type="submit"]').prop('disabled', true);
                useAjax2('contact','postForm');

            },

        });


        $('#successModal').on('hidden.bs.modal', function () {
            window.location.reload();
        });


    })





</script>