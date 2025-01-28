import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AutorCreateComponent } from './autor-create.component';

describe('AutorCreateComponent', () => {
  let component: AutorCreateComponent;
  let fixture: ComponentFixture<AutorCreateComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [AutorCreateComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(AutorCreateComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
