import { HttpClientModule, HttpHandler, HttpEvent, HTTP_INTERCEPTORS } from '@angular/common/http';

import { NgModule } from '@angular/core';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { FooterComponent } from './shop/components/footer.component';
import { HeaderComponent } from './shop/components/header.component';
import { JWTInterceptorService } from './shop/jwtinterceptor.service';
import { ShopRoutingModule } from './shop/shop-routing.module';
import { ShopModule } from './shop/shop.module';
import { NgxPaginationModule } from 'ngx-pagination';
import { ListorderComponent } from './shop/components/listorder.component';
import { GoogleLoginProvider } from '@abacritt/angularx-social-login';
import { FacebookLoginProvider } from '@abacritt/angularx-social-login';
import { SocialAuthServiceConfig } from '@abacritt/angularx-social-login';
import { ToastrModule } from 'ngx-toastr';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    FooterComponent,
    ListorderComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    ShopRoutingModule,
    HttpClientModule,
    ShopModule,
    ReactiveFormsModule,
    NgxPaginationModule,
    FormsModule,
    ToastrModule.forRoot()
    
  ],
  providers: [{ provide: HTTP_INTERCEPTORS, useClass: JWTInterceptorService, multi: true },
    { provide: HTTP_INTERCEPTORS, useClass: JWTInterceptorService, multi: true },
    {
      provide: 'SocialAuthServiceConfig',
      useValue: {
        autoLogin: false,
        providers: [
          {
            id: FacebookLoginProvider.PROVIDER_ID,
            provider: new FacebookLoginProvider('5566948123396307')
          }
        ],
        onError: (err) => {
          console.error(err);
        }
      } as SocialAuthServiceConfig,
    }
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
