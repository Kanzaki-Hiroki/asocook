new Vue({
    el: '#account_form',
    data: {
        lname:'',
        fname:'',
        email:'',
        pass:'',
        re_pass:'',
        address:'',
        tel:''
    },

    // computed:{

    // },
    computed:{
        checkLname(){
            return this.lname;
        },
        checkFname(){
            return this.fname;
        },
        checkEmail(){
            regex = /^(?!.*[._-]{2})[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
            return regex.test(this.email);
        },
        checkPassreg(){
            regex = /^[a-zA-Z0-9]{6,12}$/; //半角英数字6～12文字
            return regex.test(this.pass);
        },
        passwordMismatch(){
            return this.pass && this.re_pass && this.pass !== this.re_pass;
        },
        checkTel(){ //10桁or11桁の電話番号
            regex = /^\d{10,11}$/;
            return regex.test(this.tel);
        },
        checkAllinput(){ //上記全ての条件に当てはまるか判定
            // return this.lname && this.fname && this.email && this.pass && this.re_pass && this.address && this.tel;
            return this.checkLname && this.checkFname && this.checkEmail && this.checkPassreg && !this.passwordMismatch && this.address && this.checkTel;
        }
    }
});