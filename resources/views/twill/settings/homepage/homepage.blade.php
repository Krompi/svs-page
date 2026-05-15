@twillBlockTitle('Homepage')
@twillBlockIcon('text')
@twillBlockGroup('app')
 
<x-twill::browser
    label="Select the homepage"
    module-name="pages"
    name="page"/>

<hr style="margin: 20px 0; border: 0; border-top: 1px solid #eee;">

<h3>Slider Einstellungen</h3>

<x-twill::checkbox
    name="slider_autoplay"
    label="Autoplay aktivieren"
    :default="true"
/>

<x-twill::checkbox
    name="slider_arrows"
    label="Pfeile anzeigen"
    :default="true"
/>

<x-twill::checkbox
    name="slider_pagination"
    label="Punkte (Pagination) anzeigen"
    :default="true"
/>
