import { Component } from '@angular/core';
import { ILlibre } from '../interfaces/illibre';
import { DadesLlibresService } from '../services/dades-llibres.service';

@Component({
  selector: 'app-llibres-list',
  standalone: false,
  
  templateUrl: './llibres-list.component.html',
  styleUrl: './llibres-list.component.css'
})
export class LlibresListComponent {
  titolLlistat = 'Llistat de llibres';
  llibres:ILlibre[] = [];
  constructor(private llibreService: DadesLlibresService){ }
      ngOnInit() {
        //fem servir event de creacio
        console.log("Listat d'autors inicialitzat");
        this.llibreService.getDades().subscribe(resp => {
        // accedim al body de la resposta HTTP.
        if (resp.body) {
          this.llibres = resp.body;
        }
        });
      }
}
