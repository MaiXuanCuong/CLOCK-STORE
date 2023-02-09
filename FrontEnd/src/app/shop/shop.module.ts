import { CUSTOM_ELEMENTS_SCHEMA, NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { HttpClientModule } from '@angular/common/http';
import { ReactiveFormsModule,FormsModule } from '@angular/forms';
import { RouterModule} from '@angular/router';
import { HomeComponent } from './components/home.component';
import { CheckoutComponent } from './components/checkout.component';
import { ProductListComponent } from './components/product-list.component';
import { ProductDetailComponent } from './components/product-detail.component';
import { RegisterComponent } from './components/register.component';
import { LoginComponent } from './components/login.component';
import { OrderDetailComponent } from './components/order-detail.component';
import { ShopRoutingModule } from './shop-routing.module';
import { NgxPaginationModule } from 'ngx-pagination';



@NgModule({
  declarations: [
    HomeComponent,
    CheckoutComponent,
    ProductListComponent,
    ProductDetailComponent,
    RegisterComponent,
    LoginComponent,
    OrderDetailComponent,

  ],
  imports: [
    CommonModule,
    RouterModule,
    HttpClientModule,
    ReactiveFormsModule,
    BrowserAnimationsModule,
    FormsModule,
    ShopRoutingModule,
    NgxPaginationModule,
  ],
  providers: [],
  schemas:[CUSTOM_ELEMENTS_SCHEMA]
})
export class ShopModule { }
