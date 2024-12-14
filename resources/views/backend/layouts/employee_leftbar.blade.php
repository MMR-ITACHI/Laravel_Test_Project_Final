<nav id="primary-nav">
                    <ul>
                        <li>
                            <a href="{{ url('employee/dashboard') }}" class="active"><i class="fa fa-fire"></i>Dashboard</a>
                        </li>

                        <li>
                        <a href="#"><i class="fa fa-th-list" class="active"></i>Send Courier Details</a>
                            <ul>
                              <li>
                                 <a href="{{ route('courierdetails.create') }}"  class="active"><i class="fa fa-glass"></i>Send Courier</a>
                              </li>

                              <li>
                            <a href="{{route('courierdetails.index')}}" class="active"><i class="fa fa-fire"></i>Courier List</a>
                        </li>

                            </ul>

                        </li>

                        

                        
                       
                        <li>
                            <a href="#"><i class="fa fa-table"></i>Delivery Details</a>
                            <ul>
                                <li>
                                    <a href="{{ route('Deliveryinfo.info') }}"><i class="fa fa-tint"></i>Shipped For Delivery</a>
                                </li>
                                <li>
                                    <a href="{{ route('DeliverySuccess.info') }}"><i class="fa fa-th"></i>Delivered</a>
                                </li>
                                
                            </ul>
                        </li>

                        
                        
                </nav>