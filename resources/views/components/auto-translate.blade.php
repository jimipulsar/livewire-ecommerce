@if(app()->getLocale() === 'en')
    <div id="google_translate_element" style=""></div>

    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'it',
                includedLanguages:'en'
            }, 'google_translate_element');
            setTimeout(function(){
                var select = document.querySelector('select.goog-te-combo');
                select.value    = "en";
                select.dispatchEvent(new Event('change'));
            },1000)
        }
    </script>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

@endif
