var opts = {
    lines: 12,
    angle: 0,
    lineWidth: 0.4,
    pointer: {
        length: 0.75,
        strokeWidth: 0.042,
        color: '#1D212A'
    },
    limitMax: 'false',
    colorStart: '#1ABC9C',
    colorStop: '#1ABC9C',
    strokeColor: '#F0F3F3',
    generateGradient: true
};
var target = document.getElementById('foo'),
    gauge = new Gauge(target).setOptions(opts);
gauge.maxValue = 100;
gauge.animationSpeed = 32;
gauge.set(80);
gauge.setTextField(document.getElementById("gauge-text"));
var target = document.getElementById('foo2'),
    gauge = new Gauge(target).setOptions(opts);
gauge.maxValue = 5000;
gauge.animationSpeed = 32;
gauge.set(4200);
gauge.setTextField(document.getElementById("gauge-text2"));