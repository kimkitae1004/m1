# Mobile Layout1

## Main Layout
-------------

### Elements Architecture
> div.wrap>(header#hd>h1.title+(nav#gnb>ul>(li>a>img)*4)+(figure#visual>video#vdo1))+(footer#ft>(nav#fnb>ul>(li>a)*9)+h2.copyright)

### Style Markup
> initial Style -> *, body, html, ul, a, img
> header Style -> header#hd, h1.title
> navigation Style -> nav, ul, li, a, img
> page Contents Style -> video#vdo1
> footer Style -> nav#fnb, ul, li, a, h2.copyright

--------------------------------------------------------
--------------------------------------------------------

## Subpage1 Layout
------------------

### Elements Architecture

> (div.wrap>(header#hd>(div.hdbar>a.home+h2.title+label[for=collap_ck].collap)+input[type=checkbox]#collap_ck+(nav#collapMenu.colItem>ul>(li>a)*4)+(nav#gnb.colItem>ul>(li>a)*4)+(nav#subItem.colItem>ul>(li>a)*3))+(div#contents>(figure#visual>img+(div.titleBox>h2.banTitle+a.more))+(section#page1>h2.pageTitle+img.pageImg+p.pageComent)*3)+(footer#ft>h3.copyrights))+input[type=checkbox]#side_ck+label[for=side_ck]#sideOpener+(aside#sidebar>(nav#lnb>ul>(li>a)*9)+div.sidebarBanner)

### Style Markup
> initial Style -> *, body, html, ul, a, img
> header Style -> div.hdbar, a.home, label.collap, h2.title
> navigation Style -> nav, ul, li, a
> page Contents Style -> h2.pageTitle, img.pageImg, p.pageComent
> footer Style -> h3.copyrights
> sidebar Style -> aside#sidebar, nav#lnb, ul, li, a, div.sidebarBanner
> button Style -> a.home, label.collap, label#sideOpener
> collapsible Style1 -> input[type=checkbox]#collap_ck
>> input[type=checkbox]#collap_ck:checked ~ #collapMenu
> collapsible Style2 -> input[type=checkbox]#side_ck
>> input[type=checkbox]#side_ck:checked ~ #sidebar


