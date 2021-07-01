import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AlbumsComponent } from './components/albums/albums.component';
import { PhotosComponent } from './components/photos/photos.component';
import { AddPhotoComponent } from './components/add-photo/add-photo.component';
import { EditPhotoComponent } from './components/edit-photo/edit-photo.component';

const routes: Routes = [
  { path: '', component: AlbumsComponent },
  { path: 'photos/:albumId', component: PhotosComponent },
  { path: 'add-photo', component: AddPhotoComponent },
  { path: 'edit-photo', component: EditPhotoComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
