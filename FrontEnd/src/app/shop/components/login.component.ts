import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { User } from '../shop';
import { AuthService } from '../auth.service';
import { SocialUser,SocialAuthService ,FacebookLoginProvider} from '@abacritt/angularx-social-login';
import { HttpClient } from '@angular/common/http';
import { ToastrService } from 'ngx-toastr';
@Component({
  selector: 'user-login',
  templateUrl: './../templates/login.component.html',
})
export class LoginComponent implements OnInit {
  loginForm!: FormGroup;
  ChangePassForm!: FormGroup;
  error: any;
  user:any = SocialUser;
  loggedIn:any;
  constructor(
    private _Router: Router,
    private _UserService: AuthService,
    private authService: SocialAuthService,
    private toastr: ToastrService
    ) { }

  ngOnInit(): void {
    this.authService.authState.subscribe((user) => {
      this.user = user;
      this.loggedIn = (user != null);
    });

    if(!this._UserService.checkAuth()){
    this.loginForm = new FormGroup({
      'email':new FormControl('',[
        Validators.required,
        Validators.email,
      ]),
      'password': new FormControl('',[
        Validators.required,
        Validators.minLength(6)
      ]),
    });
    this.ChangePassForm = new FormGroup({
      'email':new FormControl('',[
        Validators.required,
        Validators.email,
      ])
    })
  } else {
    this._Router.navigate(['home']);
  }
  }
  onSubmit():void{
    let data = this.loginForm.value;
    let User: User = {
      email:data.email,
      password:data.password,
    }
    this._UserService.login(User).subscribe(res =>{
        localStorage.setItem('access_token', res.access_token);
        this._Router.navigate(['home']);
        this.toastr.success('Thành công', 'Đăng nhập!');
    }, err => {
      if(err.status === 401) {
        this.toastr.error('Không thành công', 'Đăng nhập!');
      }
      this.error = true;
    });
  }
  Submit():void{
    let data = this.ChangePassForm.value;
    let email = {
      email:data.email,
    }
    this.toastr.clear();
    this.toastr.info('Đang xử lý...', 'Đang xác minh Email?');
    this._UserService.changePassByMail(email).subscribe(res =>{
        this._Router.navigate(['/login']);
        this.toastr.clear();
        this.toastr.success('Thành công', 'Gửi yêu cầu mật khẩu!');
    }, err => {
      if(err.status === 401) {
        this.toastr.clear();
        this.toastr.error('Email không tồn tại', 'Yêu cầu không thành công');
      }
    });
  }
  signInWithFB(): void {
    this.authService.signIn(FacebookLoginProvider.PROVIDER_ID);
    this.register(this.user);
  }
  signOut(): void {
    this.authService.signOut();
  }
  register(data:any){
    let User: User = {
      name:data.name,
      phone:0,
      email:data.email,
      password:data.id,
    }
    this._UserService.login(User).subscribe(res =>{
      this.login(User);
    });
    this._UserService.register(User).subscribe(()=>{
      this.login(User);
    });
}
  login(User: any){
    this._UserService.login(User).subscribe(res =>{
      localStorage.setItem('access_token', res.access_token);
      this._Router.navigate(['home']);
      this.toastr.success('Thành công', 'Đăng nhập!');
    });
  }
  }
