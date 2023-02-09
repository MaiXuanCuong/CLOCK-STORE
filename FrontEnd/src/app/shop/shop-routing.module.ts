import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { CheckoutComponent } from './components/checkout.component';
import { HeaderComponent } from './components/header.component';
import { HomeComponent } from './components/home.component';
import { ListorderComponent } from './components/listorder.component';
import { LoginComponent } from './components/login.component';
import { OrderDetailComponent } from './components/order-detail.component';
import { ProductDetailComponent } from './components/product-detail.component';
import { ProductListComponent } from './components/product-list.component';
import { RegisterComponent } from './components/register.component';

const routes: Routes = [
  { path: '', redirectTo: '/home', pathMatch: 'full' },
  { path: 'home', component: HomeComponent },
  { path: 'login', component: LoginComponent},
  { path: 'register', component: RegisterComponent},
  { path: 'checkout', component: CheckoutComponent},
  { path: 'product-list', component: ProductListComponent },
  { path: 'product-detail/:id', component: ProductDetailComponent },
  { path: 'order-detail/:id', component: OrderDetailComponent },
  { path: 'listorder/:id', component: ListorderComponent },
  { path: 'product-list/:search/:id', component: ProductListComponent },
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
  providers: []

})
export class ShopRoutingModule { }
