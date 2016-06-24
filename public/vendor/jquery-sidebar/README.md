# jquery-sidebar
**这是一个基于jQuery的侧边栏插件,兼容PC和移动端**
目前的版本是 **`1.0.0`** 相比上一个版本 **`0.1.0`** 添加了几个插件可选参数,接口和侧边栏的展现切换方式.消除了大部分bug,如有发现bug,请提给我,帮我改进.谢谢!

## 首先
加入必须的CSS样式和Javascript文件,Javascript放在 `</body>`前,jQuery为必须加入的,也必须先加载.生产环境加载压缩后的文件`min.css`和`min.js`
```html
<link href="jQuery-Sidebar.min.css" rel="stylesheet">
<script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
<script src="jQuery-Sidebar.min.js"></script>
```

##加入侧边栏功能
需在HTML中加入相应div与class

加入左侧边栏
```html
<div class="jqsb-sidebar jqsb-left">左侧边栏内容</div>
```

如果左侧边栏切换的方式为**大小交替**,就这样引入.
```html
<div class="jqsb-sidebar jqsb-left">
    <div class="jqsb-left-sm"></div>
    <div class="jqsb-left-bg"></div>
</div>
```

加入右侧边栏
```html
<div class="jqsb-sidebar jqsb-right">右侧边栏内容</div>
```

如果左侧边栏切换的方式为**大小交替**,就这样引入.
```html
<div class="jqsb-sidebar jqsb-right">
    <div class="jqsb-right-sm"></div>
    <div class="jqsb-right-bg"></div>
</div>
```

你的网站内容需包裹在container中
```html
<div class="jqsb-container">网站内容</div>
```

为你的**HTML**元素添加 `class="jqsb-toggle-left"` 或 `class="jqsb-toggle-right"` 来实现点击切换侧边栏的功能

##初始化插件
最简单方式,此方式不能初始化侧边栏的**大小交替**,需填写参数.
```javascript
$(function(){
    $.jqSidebar();
});
```

##插件参数
| 参数名 | 类型 | 默认值 | 可选参数 | 说明 |
| -------- | -------- | -------- | -------- | -------- |
| leftMode | String | container-offset | container-offset , sidebar-offset , sidebar-turn | 左侧边栏的切换方式 **container-offset :** jqsb-container的div整体向右移动; **sidebar-offset:**左侧侧边栏移动;**sidebar-turn:**侧边栏中必须包含"jqsb-left-sm"和"jqsb-left-bg"两个div块,大小块交替切换|
| rightMode | String | container-offset | container-offset , sidebar-offset , sidebar-turn | 右侧边栏的切换方式 **container-offset :** jqsb-container的div整体向左移动; **sidebar-offset:**右侧侧边栏移动;**sidebar-turn:**侧边栏中必须包含"jqsb-right-sm"和"jqsb-right-bg"两个div块,大小块交替切换|
| leftTurnShow | String | jqsb-left-bg  | jqsb-left-bg , jqsb-left-sm | 如果左侧边栏是**大小交替**,初始化后显示大的块还是小的块 |
| rightTurnShow | String | jqsb-right-bg  | jqsb-right-bg , jqsb-right-sm | 如果右侧边栏是**大小交替**,初始化后显示大的块还是小的块 |
| sideActive | String | ''  | left , right | 哪边侧边栏初始化是打开状态的 |
| autoClose | Boolean | true  | true , false | 点击container区域是否自动关闭侧边栏 |

##接口
调用方式
```javascript
var jqsb = new $.jqSidebar();
jqsb.toggle('left');
jqsb.open('left');
jqsb.close('left');
jqsb.destroy('left');
```
| 方法名 | 类型 | 可选参数 | 说明 |
| ------ | ---- | ---- | ---- |
| toggle | String | 'left' , 'right' | 侧边栏开关 |
| open | String | 'left' , 'right' | 打开侧边栏 |
| close | String | 'left' , 'right' | 关闭侧边栏 |
| destroy | String | 'left' , 'right' | 销毁侧边栏 |
