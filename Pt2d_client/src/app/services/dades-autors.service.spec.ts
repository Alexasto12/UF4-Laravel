import { TestBed } from '@angular/core/testing';

import { DadesAutorsService } from './dades-autors.service';

describe('DadesAutorsService', () => {
  let service: DadesAutorsService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(DadesAutorsService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
