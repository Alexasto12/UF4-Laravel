import { HttpClient, HttpResponse } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { ILlibre } from '../interfaces/illibre';

@Injectable({
  providedIn: 'root'
})
export class DadesLlibresService {

 constructor(private _http:HttpClient) { }
 
   public getDades(): Observable<HttpResponse<ILlibre[]>> {
     return this._http.get<ILlibre[]>('api/llibres',    { observe: 'response' });
     //get retorna un observable
   }
}
