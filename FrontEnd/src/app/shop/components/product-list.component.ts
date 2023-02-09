import { Component, EventEmitter, OnInit, Output } from '@angular/core';
import { ShopService } from './../shop.service';
import { environment } from 'src/environments/environment';
import { ActivatedRoute, Router, RouterLink } from '@angular/router';
import { FormBuilder, FormGroup } from '@angular/forms';
import { ToastrService } from 'ngx-toastr';
@Component({
  selector: 'app-product-list',
  templateUrl: '../templates/product-list.component.html',
})
export class ProductListComponent implements OnInit {
  constructor(private shopService : ShopService,
   private _route: ActivatedRoute,
   private fb: FormBuilder,
   private toastr: ToastrService

     ) { }

  data: any;
  id: any;
  search: any;
  brand_id: any;
  cate_id: any;
  product_id: any;
  products: any[] = [];
  brands: any[] = [];
  categories: any[] = [];
  trending_top:any[] =[];
  url: string = environment.url;
  listCart: any;
  listCartByLike: any;
  cartSubtotal: number = 0;
  cartSubByLiketotal: number = 0;
  serachForm!: FormGroup;
  page: number = 1;
  count:number =0;
  tableSize: number=8;
  tableSizes:any = [5,10,15,20];
  color_1:any = 'dark';
  color_2:any = 'dark';
  color_3:any = 'dark';
  color_2t: any = 'dark';
  color_2t_5t: any = 'dark';
  color_5t_10t: any = 'dark';
  color_10t_20t: any = 'dark';
  color_20t_50t: any = 'dark';
  color_50t: any = 'dark';
  product_cate: any[] = [];
  product_brand: any[] = [];
  product_gender: any[] = [];
  product_price: any[] = [];


  ngOnInit(): void {
    this.product_list();
    this.band_list();
    this.cate_list();
    this.serachForm = this.fb.group({
      search: [''],
    })
    if(this._route.snapshot.params['id'] && this._route.snapshot.params['search'] ){
      this.id = this._route.snapshot.params['id'];
      this.search = this._route.snapshot.params['search'];
      console.log(this.id);
      console.log(this.search);
      if(this.search=="cate")
      {
        this.product_OfCate(this.id)
      }else if( this.search == "brand"){
        this.product_OfBrand(this.id)
      }else {
        this.trending();
      }
    }

  }
  reset_color(){
    this.color_1 = 'dark';
    this.color_2 = 'dark';
    this.color_3 = 'dark';
  }
  reset_color_price(){
    this.color_2t = 'dark';
    this.color_2t_5t = 'dark';
    this.color_5t_10t = 'dark';
    this.color_10t_20t = 'dark';
    this.color_20t_50t = 'dark';
    this.color_50t = 'dark';
  }
  product_list(){
    this.reset_color();
    this.reset_color_price();
    this.product_cate = [];
    this.product_brand = [];
    this.product_gender = [];
    this.product_price = [];
    this.shopService.product_list().subscribe(res =>{
      this.products = res;
      this.color_1='warning';
    })
  }
  ontableDataChange(event: any){
    this.page = event;
    this.product_list;
  }
  onTableSizeChange(event:any):void{
    this.tableSize = event.target.value;
    this.page = 1;
    this.product_list();
  }

  band_list(){
    this.shopService.brand_list().subscribe(res => {
      this.brands = res;
    })
  }
  cate_list(){
    this.shopService.cate_list().subscribe(res => {
      this.categories = res;
    })
  }
  product_OfBrand(brand_id:any){
    this.reset_color_price()
    this.reset_color();
    this.color_1='warning';
    this.brand_id= brand_id;
    this.shopService.brand_list().subscribe(res =>{
      this.brands= res;
      for(const brand of this.brands){
        if(this.brand_id == brand.id){
          this.products = brand.products;
          this.product_brand = this.products;
        }
      }

    })
  }
  product_OfCate(cate_id:any){
    this.reset_color_price();
    this.reset_color();
    this.color_1='warning';
    this.cate_id= cate_id;
    this.shopService.cate_list().subscribe(res =>{
      this.categories= res;
      for(const category of this.categories){
        if(this.cate_id == category.id){
          this.products = category.products;
          this.product_cate = this.products;
        }
      }
    })
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
  getAllCart() {
    this.shopService.getAllCart().subscribe(res => {
      this.listCart = res;
      this.cartSubtotal = 0;
      for (let cart of this.listCart) {
        this.cartSubtotal += cart.price * cart.quantity;
      }
    });
  }
  getAllCartBylike() {
    this.shopService.getAllCartByLike().subscribe(res => {
      this.listCartByLike = res;
      this.cartSubByLiketotal = 0;
      for (let cartlike of this.listCartByLike) {
        this.cartSubByLiketotal += cartlike.price * cartlike.quantity;
      }
    });
  }
  product_male(gender:any){
    this.reset_color();
    if(gender == 'Nam'){
      this.color_2 = 'warning';
    }else{
      this.color_3 = 'warning';
    }
    if(this.product_cate.length != 0){
      this.products=this.product_cate;
    }else if(this.product_brand.length != 0){
      this.products=this.product_brand;
    }else if(this.product_price.length != 0){
      this.products=this.product_price;
    }else {
      this.shopService.product_list().subscribe(res =>{
      this.products = res;
      let array: any[] = [];
        for(let product of this.products){
          if(product.type_gender == gender)
          {
            array.push(product);
          }
        }
        this.products=array;
        this.product_gender= this.products;
        });
      }
      let array: any[] = [];
        for(let product of this.products){
          if(product.type_gender == gender)
          {
            array.push(product);
          }
        }
        this.products=array;
        this.product_gender= this.products;

  }

  product_by_price(price:any){
    this.reset_color_price();
    if(this.product_gender.length != 0){
      this.products= this.product_gender;
    }else if(this.product_cate.length != 0){
      this.products=this.product_cate;
    }else if(this.product_brand.length != 0){
      this.products=this.product_brand;
    }else {
      this.shopService.product_list().subscribe(res =>{
      this.products = res;
      let array: any[] = [];
      switch(price){
        case '2t' :
          this.color_2t='warning';
          for(let product of this.products){
            if(product.price < 2000000)
            {
              array.push(product);
            }
          }
          this.products=array;
          this.product_price= this.products;
          break;
        case '2t-5t':
          this.color_2t_5t='warning';
          for(let product of this.products){
            if(product.price >= 2000000 && product.price <= 5000000)
            {
              array.push(product);
            }
          }
          this.products=array;
          this.product_price= this.products;
          break;
        case '5t-10t':
          this.color_5t_10t='warning';
          for(let product of this.products){
            if(product.price >= 5000000 && product.price <= 10000000)
            {
              array.push(product);
            }
          }
          this.products=array;
          this.product_price= this.products;
          break;
        case '10t-20t':
          this.color_10t_20t='warning';
          for(let product of this.products){
            if(product.price >= 10000000 && product.price <= 20000000)
            {
              array.push(product);
            }
          }
          this.products=array;
          this.product_price= this.products;
          break;
        case '20t-50t':
          this.color_20t_50t='warning';
          for(let product of this.products){
            if(product.price >= 20000000 && product.price <= 50000000)
            {
              array.push(product);
            }
          }
          this.products=array;
          this.product_price= this.products;
          break;
        case '50t':
          this.color_50t='warning';
          for(let product of this.products){
            if(product.price > 50000000)
            {
              array.push(product);
            }
          }
          this.products=array;
          this.product_price= this.products;
          break;
        }
      });
    }
    let array: any[] = [];
      switch(price){
        case '2t' :
          this.color_2t='warning';
          for(let product of this.products){
            if(product.price < 2000000)
            {
              array.push(product);
            }
          }
          this.products=array;
          this.product_price= this.products;
          break;
        case '2t-5t':
          this.color_2t_5t='warning';
          for(let product of this.products){
            if(product.price >= 2000000 && product.price <= 5000000)
            {
              array.push(product);
            }
          }
          this.products=array;
          this.product_price= this.products;
          break;
        case '5t-10t':
          this.color_5t_10t='warning';
          for(let product of this.products){
            if(product.price >= 5000000 && product.price <= 10000000)
            {
              array.push(product);
            }
          }
          this.products=array;
          this.product_price= this.products;
          break;
        case '10t-20t':
          this.color_10t_20t='warning';
          for(let product of this.products){
            if(product.price >= 10000000 && product.price <= 20000000)
            {
              array.push(product);
            }
          }
          this.products=array;
          this.product_price= this.products;
          break;
        case '20t-50t':
          this.color_20t_50t='warning';
          for(let product of this.products){
            if(product.price >= 20000000 && product.price <= 50000000)
            {
              array.push(product);
            }
          }
          this.products=array;
          this.product_price= this.products;
          break;
        case '50t':
          this.color_50t='warning';
          for(let product of this.products){
            if(product.price > 50000000)
            {
              array.push(product);
            }
          }
          this.products=array;
          this.product_price= this.products;
          break;
      }
  }
  product_search(search : any){
    let keywork = this.serachForm.value.search;
    this.shopService.product_search(keywork).then(res => {
    this.data = res;
    this.products = this.data
    })
  }

}
