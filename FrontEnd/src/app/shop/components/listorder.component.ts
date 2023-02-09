import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { environment } from 'src/environments/environment';
import { ShopService } from '../shop.service';

@Component({
  selector: 'app-listorder',
  templateUrl: './../templates/listorder.component.html',
})
export class ListorderComponent implements OnInit {

  customer_id: any;
  order: any;
  totalPrice: number = 0;
  url: string = environment.url;
  constructor(
    private ShopService: ShopService,
    private route: ActivatedRoute,
    private router: Router
  ) { }

  ngOnInit(): void {
    this.customer_id = this.route.snapshot.params['id'];
    this.ShopService.getListOrder(this.customer_id).subscribe(res => {
      this.order = res;
      for(let orderDetail of this.order.orders.order_details) {
        this.totalPrice += parseInt(orderDetail.price_at_time) * parseInt(orderDetail.quantity);
      }
    })
  }

}
