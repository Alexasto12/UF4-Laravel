import { Pipe, PipeTransform } from '@angular/core';
import { IAutor } from '../interfaces/iautor';
@Pipe({
  name: 'autorListFilter',
  standalone: false
})
export class AutorListFilterPipe implements PipeTransform {
  transform(autors: IAutor[], filterBy: string): IAutor[] {
    filterBy = filterBy ? filterBy.toLowerCase() : '';
    return filterBy ? autors.filter((autor) => {
      const lowerCaseFilter = filterBy.toLowerCase();
      return autor.nom.toLowerCase().indexOf(lowerCaseFilter) !== -1 || autor.cognoms.toLowerCase().indexOf(lowerCaseFilter) !== -1;
    }) : autors;
  }
}
