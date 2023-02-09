import { Component, OnInit } from '@angular/core';
import { ShopService } from './../shop.service';
import { environment } from 'src/environments/environment';import { ToastrService } from 'ngx-toastr';
 '';
@Component({
  selector: 'app-home',
  templateUrl: './../templates/home.component.html',
})
export class HomeComponent implements OnInit {

  constructor( 
    private shopService : ShopService,
    private toastr: ToastrService

    ) { }
  url: string = environment.url;
  trending_top:any[] =[];

  ngOnInit(): void {
    this.trending();
  }

  trending(){
    this.shopService.tranding_top().subscribe(res =>{
      this.trending_top = res;
    })
  }
  addToCart(id: number) {
    this.shopService.addToCart(id).subscribe(res => {
      this.toastr.success('Thành công', 'Thêm vào giỏ hàng!');
    })
  }
  addToCartByLike(id: number) {
    this.shopService.addToCartByLike(id).subscribe(res => {
      this.toastr.success('Thành công', 'Thêm vào giỏ hàng yêu thích!');
    })
  }
}
