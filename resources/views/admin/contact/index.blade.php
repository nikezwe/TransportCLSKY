<!-- resources/views/admin/contacts/index.blade.php -->
@extends('layouts.admin')
@section('title', 'Messages - Administration')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Messages reçus</h2>
        <span class="badge" style="background: var(--primary-color); color: white; padding: 8px 15px; border-radius: 20px;">
            {{ $contacts->total() }} message(s)
        </span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Sujet</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contacts as $contact)
                    <tr>
                        <td style="font-weight: 500;">{{ $contact->name }}</td>
                        <td>
                            <a href="mailto:{{ $contact->email }}" style="color: var(--primary-color);">
                                {{ $contact->email }}
                            </a>
                        </td>
                        <td>{{ Str::limit($contact->subject, 30) }}</td>
                        <td>{{ Str::limit($contact->message, 50) }}</td>
                        <td>{{ $contact->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-sm btn-primary" title="Voir">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirmDelete()">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align: center; color: #64748b; padding: 40px;">
                            Aucun message reçu
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $contacts->links() }}
    </div>
</div>
@endsection

<!-- resources/views/admin/contacts/show.blade.php -->
@extends('layouts.admin')
@section('title', 'Détails du Message')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Détails du message</h2>
        <div style="display: flex; gap: 10px;">
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-secondary">
                <i class="fas fa-arrow-left"></i> Retour
            </a>
            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirmDelete('Êtes-vous sûr de vouloir supprimer ce message ?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash"></i> Supprimer
                </button>
            </form>
        </div>
    </div>
    <div class="card-body">
        <div style="background: var(--light); padding: 30px; border-radius: 12px;">
            <!-- Sender Info -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px; padding-bottom: 20px; border-bottom: 2px solid #cbd5e1;">
                <div>
                    <p style="color: var(--gray); font-size: 13px; margin-bottom: 5px;">NOM COMPLET</p>
                    <p style="font-size: 16px; font-weight: 600; color: var(--dark);">
                        <i class="fas fa-user" style="color: var(--primary-color); margin-right: 8px;"></i>
                        {{ $contact->name }}
                    </p>
                </div>
                <div>
                    <p style="color: var(--gray); font-size: 13px; margin-bottom: 5px;">EMAIL</p>
                    <p style="font-size: 16px; font-weight: 600; color: var(--dark);">
                        <i class="fas fa-envelope" style="color: var(--primary-color); margin-right: 8px;"></i>
                        <a href="mailto:{{ $contact->email }}" style="color: var(--primary-color);">
                            {{ $contact->email }}
                        </a>
                    </p>
                </div>
            </div>

            <!-- Subject -->
            <div style="margin-bottom: 30px;">
                <p style="color: var(--gray); font-size: 13px; margin-bottom: 8px;">SUJET</p>
                <h3 style="font-size: 20px; color: var(--dark); font-weight: 600;">
                    {{ $contact->subject }}
                </h3>
            </div>

            <!-- Message -->
            <div style="margin-bottom: 30px;">
                <p style="color: var(--gray); font-size: 13px; margin-bottom: 8px;">MESSAGE</p>
                <div style="background: white; padding: 20px; border-radius: 8px; border-left: 4px solid var(--primary-color);">
                    <p style="font-size: 15px; line-height: 1.6; color: var(--dark); white-space: pre-wrap;">{{ $contact->message }}</p>
                </div>
            </div>

            <!-- Date -->
            <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 20px; border-top: 1px solid #cbd5e1;">
                <p style="color: var(--gray); font-size: 14px;">
                    <i class="fas fa-clock" style="margin-right: 5px;"></i>
                    Reçu le {{ $contact->created_at->format('d/m/Y à H:i') }}
                </p>
                <a href="mailto:{{ $contact->email }}?subject=RE: {{ $contact->subject }}" class="btn btn-primary">
                    <i class="fas fa-reply"></i> Répondre par email
                </a>
            </div>
        </div>
    </div>
</div>
@endsection