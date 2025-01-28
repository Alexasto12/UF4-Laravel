import { ComponentFixture, TestBed } from '@angular/core/testing';

import { LlibreCreateComponent } from './llibre-create.component';

describe('LlibreCreateComponent', () => {
  let component: LlibreCreateComponent;
  let fixture: ComponentFixture<LlibreCreateComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [LlibreCreateComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(LlibreCreateComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
