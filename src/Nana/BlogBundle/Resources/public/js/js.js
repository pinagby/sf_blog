        window.addEvent('domready',function(){
            var flag=0;
            var mySlide = new Fx.Slide('left_con');
            $('left_title').addEvent('click',function(event){
                alert("dddd");
                if(flag == 0){
                    event.stop();
                    mySlide.slideOut();
                    flag=1;
                }else{
                    event.stop();
                    mySlide.slideIn();
                    flag=0;
                } 

            });
            
            
            /*var morphSet = function(){
                 // 这里我们可以像 Fx.Tween 一样设置样式属性
                 // 不过在这里我们可以同时设置多个样式属性
                 this.set({
                     'width': 100,
                     'height': 100,
                     'background-color': '#eeeeee'
                 });
             }
             var morphStart = function(){
                 // 我们也可以像启动一个渐变一样启动一个形变
                 // 过现在我们可以同时设置多个样式属性
                this.start({
                    'width': 300,
                    'height': 300,
                    'background-color': '#d3715c'
                });
            }
            var morphReset = function(){
                // 设置为最开始的值
                this.set({
                    'width': 0,
                    'height': 0,
                    'background-color': '#ffffff'
                });
            }
            window.addEvent('domready', function() {
                // 首先，把我们的元素赋值给一个变量
                var morphElement = $('morph_element');
                // 现在，我们创建我们的形变
                var morphObject = new Fx.Morph(morphElement);
                // 在这里我们给按钮添加点击事件
                // 并且绑定 morphObject 和这个函数
                // 从而可以在上面的函数中使用"this"
                $('morph_set').addEvent('click', morphSet.bind(morphObject));
                $('morph_start').addEvent('click', morphStart.bind(morphObject));
                $('morph_reset').addEvent('click', morphReset.bind(morphObject));
            });
             */
        });