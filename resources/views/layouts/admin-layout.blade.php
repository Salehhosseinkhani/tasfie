<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تصفیه ده تقی زاده</title>

    <link rel="stylesheet" href="./css/admin.css">
</head>
<body>
    <section class="head">
        <div class="div-head">
            <div class="div-title-head">
                <h1 class="title-head">پنل ادمین</h1>
            </div>
            <div class="div-image-head">
                <a href="/" class="link-image-digiadmin">
                    <img src="./image/ARM.jpg" alt="" class="image-head">
                </a>
            </div>
        </div>
    </section>
    <section class="menu">
            <div class="right-menu-site">
                    <a href="/digiadmin" class="link-menu-box right-menu-box">
                        <span class="span-menu-box-tow right-menu-site-text">پنل ادمین</span>                        
                    </a>
                    <a href="/digiadmin" class="link-menu-box right-menu-box">
                        <span class="span-menu-box-tow right-menu-site-text">دستگاه های تصفیه آب</span>                        
                    </a>
                    <a href="/adminfilter" class="link-menu-box right-menu-box">
                        <span class="span-menu-box-tow right-menu-site-text">فیلتر ها</span>                      
                    </a>
                    <a href="/adminyakhchal" class="link-menu-box right-menu-box">
                        <span class="span-menu-box-tow right-menu-site-text">فیلتر یخچال</span>                        
                    </a>
                    <a href="/adminghtaat" class="link-menu-box right-menu-box">
                        <span class="span-menu-box-tow right-menu-site-text">قطعات تصفیه آب</span>                         
                    </a>
                    <a href="/adminsard" class="link-menu-box right-menu-box">
                        <span class="span-menu-box-tow right-menu-site-text">وسایل آب سرد کن</span>                      
                    </a>
                    <a href="/adminorder" class="link-menu-box right-menu-box">
                        <span class="span-menu-box-tow right-menu-site-text">سفارشات</span>                      
                    </a>
                    <a href="/mghaleone" class="link-menu-box right-menu-box">
                        <span class="span-menu-box-tow right-menu-site-text">مقاله</span>                      
                    </a>
                    <a href="/adminsupport" class="link-menu-box right-menu-box">
                        <span class="span-menu-box-tow right-menu-site-text">خرابی و پشتیبانی</span>                      
                    </a>
                    <a href="/adminjashnvare" class="link-menu-box right-menu-box">
                        <span class="span-menu-box-tow right-menu-site-text">جشنواره</span>                      
                    </a>
            </div>
    </section>
    @yield('digiadmin')
    <script src="./js/welcome.js"></script>
</body>
</html>