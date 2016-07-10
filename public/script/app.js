/**
 * Created by Gavin on 16/2/15.
 */
var deps = [
    'jqueryExt',
    'bootstrap',
    'particlesJS'
];
seajs.use(deps,function($){
    // 回到顶端
    $.helpers.backToTop();

    function evanyou() {
        for (x.clearRect(0, 0, w, h), q = [{
            x: 0,
            y: .7 * h + f
        },
            {
                x: 0,
                y: .7 * h - f
            }]; q[1].x < w + f;) d(q[0], q[1])
    }
    function d(i, j) {
        x.beginPath(),
            x.moveTo(i.x, i.y),
            x.lineTo(j.x, j.y);
        var k = j.x + (2 * z() - .25) * f,
            n = y(j.y);
        x.lineTo(k, n),
            x.closePath(),
            r -= u / -50,
            x.fillStyle = "#" + (127 * v(r) + 128 << 16 | 127 * v(r + u / 3) + 128 << 8 | 127 * v(r + u / 3 * 2) + 128).toString(16),
            x.fill(),
            q[0] = q[1],
            q[1] = {
                x: k,
                y: n
            }
    }
    function y(p) {
        var t = p + (2 * z() - 1.1) * f;
        return t > h || 0 > t ? y(p) : t
    }

    var q,
        c = document.getElementById("evanyou"),
        x = c.getContext("2d"),
        pr = window.devicePixelRatio || 1,
        w = window.innerWidth,
        h = window.innerHeight,
        f = 90,
        m = Math,
        r = 0,
        u = 2 * m.PI,
        v = m.cos,
        z = m.random;
    c.width = w * pr,
        c.height = h * pr,
        x.scale(pr, pr),
        x.globalAlpha = .6,
        document.onclick = evanyou,
        document.ontouchstart = evanyou,
        evanyou();


});