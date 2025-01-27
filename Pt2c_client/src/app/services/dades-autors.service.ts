import { Injectable } from '@angular/core';
import { IAutor } from '../interfaces/iautor';
import { HttpClient, HttpResponse } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class DadesAutorsService {
//incorporar al service d'autors un servei http
  constructor(private _http:HttpClient) { }

  public getDades(): Observable<HttpResponse<IAutor[]>> {
    return this._http.get<IAutor[]>('api/autors',    { observe: 'response' });
    //get retorna un observable
  }
}
