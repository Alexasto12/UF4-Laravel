import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AutorListComponent } from './autor-list/autor-list.component';
import { LlibresListComponent } from './llibres-list/llibres-list.component';
import { WelcomeComponent } from './welcome/welcome.component';
import {LlibreCreateComponent} from './llibre-create/llibre-create.component';
import { AutorCreateComponent } from './autor-create/autor-create.component';

const routes: Routes = [       
  {path:'welcome', component: WelcomeComponent},
  {path:'autor-list', component: AutorListComponent},
  {path:'llibre-list', component: LlibresListComponent},
  {path:'llibre-create', component: LlibreCreateComponent},
  {path:'autor-create', component: AutorCreateComponent},
  {path:'', redirectTo:'welcome', pathMatch: 'full'},
  {path:'**', redirectTo:'welcome', pathMatch: 'full'}];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
