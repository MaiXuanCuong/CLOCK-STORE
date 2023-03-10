import { Component, OnInit } from '@angular/core';
import { ShopService } from './../shop.service';
import { environment } from 'src/environments/environment'; '';
import { FormControl, FormGroup, FormBuilder } from '@angular/forms';
import { Product} from '../shop';
import { map, Observable, switchMap } from 'rxjs';
import { ActivatedRoute, Router } from '@angular/router';
import { ToastrService } from 'ngx-toastr';
@Component({
  selector: 'app-product-detail',
  templateUrl: '../templates/product-detail.component.html',
})
export class ProductDetailComponent implements OnInit {

  constructor(
    private shopService: ShopService,
    private _route: ActivatedRoute,
   private toastr: ToastrService

    ) { }

  url: string = environment.url;
  id: any;
  product_id: any;
  products: any;
  product: any;
  images:any;
  trending_top :any[]=[];
  image1:any;
  url_image = this.url+'storage/images/product/';
  image_2 :any;
  cate_id:any;
  count: number = 0;
  product_all: any = [];
  images_array: any[] = [];
  images_array_1: any[] = [];
  inter:any;
  inter1:any;


  ngOnInit(): void {
    this.id = this._route.snapshot.params['id'];
    this.shopService.product_detail(this.id).subscribe(res =>{
      this.products = res;
      for( let product of this.products){
        this.product = product;
        this.image1 = this.url_image+this.product.image;
        this.cate_id=this.product.category_id;
      }
      this.trending();
    });

    this.shopService.product_images(this.id).subscribe(res => {
      this.images = res;
      console.log(res);
        for(let image of this.images){
          this.images_array.push(image.product_images)
        }
        this.images_array.push(this.product.image);
        var i= 0;
       this.inter=setInterval(()=>{
        this.image1 = this.url_image+this.images_array[i];
        i++;
        if(i>=this.images_array.length){
          i=0;
        }
       },3000)
    });

  }
  resetInterval(){
    clearInterval(this.inter);
  }
  trending(){
    this.shopService.product_list().subscribe(res => {
    this.product_all = res;
      for( let _product of this.product_all){
        if(_product.id == this.id){
          continue;
        }
        if(_product.category_id== this.cate_id){
          this.trending_top.push(_product);
          this.count ++;
        }
        if(this.count==4){
          break;
        }
      }
    });

  }
  change_product(id:any){
    this.images_array_1=[];
    this.resetInterval();
    this.shopService.product_detail(id).subscribe(res =>{
      this.products = res;
      for( let product of this.products){
        this.product = product;
        this.image1 = this.url_image+this.product.image;
        this.cate_id=this.product.category_id;
      }
    });
    this.shopService.product_images(id).subscribe(res => {
      this.images = res;
      for(let image of this.images){
        this.images_array_1.push(image.product_images)
      }
      this.images_array_1.push(this.product.image);
      var i= 0;
     this.inter1=setInterval(()=>{
      this.image1 = this.url_image+this.images_array_1[i];
      i++;
      if(i>=this.images_array_1.length){
        i=0;
      }
     },3000)

    });
  }
  addToCart(id: number) {
    this.shopService.addToCart(id).subscribe(res => {
      this.toastr.success('Th??nh c??ng', 'Th??m v??o gi??? h??ng!');
    })
  }
  changeImage(image:any){
    this.image1 = this.url_image + image;
  }
  addToCartByLike(id: number) {
    this.shopService.addToCartByLike(id).subscribe(res => {
      this.toastr.success('Th??nh c??ng', 'Th??m v??o gi??? h??ng y??u th??ch!');
    })
  }

}
