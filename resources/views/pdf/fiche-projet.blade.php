

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche Evaluation</title>
	    <style>
        @media print {
            @page { size: A4; margin: 0; }
            body { margin: 1cm; }
        }
    </style>

<style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .max-w-4xl {
            max-width: 62rem; /* Equivalent to Tailwind max-w-4xl (max-width) */
            margin-left: auto;
            margin-right: auto;
        }

        .bg-white {
            background-color: #ffffff;
            padding: 1.5rem; /* Equivalent to Tailwind p-6 (paddings) */
            border-radius: 0.5rem; /* Equivalent to Tailwind rounded-lg (border-radius) */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Equivalent to Tailwind shadow-md (box-shadow) */
        }

        .text-center {
            text-align: center; /* Equivalent to Tailwind text-center (text alignment) */
        }

        .mb-6 {
            margin-bottom: 1.5rem; /* Equivalent to Tailwind mb-6 (margin bottom) */
        }

        .font-bold {
            font-weight: 700; /* Equivalent to Tailwind font-bold (font weight) */
        }

        .border {
            border-width: 1px;
            border-style: solid;
            border-color: #d1d5db; /* Equivalent to Tailwind border and border-gray-400 (border color) */
        }

        .border-collapse {
            border-collapse: collapse; /* Equivalent to Tailwind border-collapse (border collapse) */
        }

        .mt-2 {
            margin-top: 0.5rem; /* Equivalent to Tailwind mt-2 (margin top) */
        }

        .p-2 {
            padding: 0.5rem; /* Equivalent to Tailwind p-2 (padding) */
        }

        .text-right {
            text-align: right; /* Equivalent to Tailwind text-right (text alignment) */
        }

        .bg-gray-200 {
            background-color: #edf2f7; /* Equivalent to Tailwind bg-gray-200 (background color) */
        }

        .font-bold {
            font-weight: bold; /* Equivalent to Tailwind font-bold (font weight) */
        }

        table {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse; /* Equivalent to Tailwind border-collapse (border collapse) */
        }

        th, td {
            border: 1px solid #d1d5db; /* Equivalent to Tailwind border and border-gray-400 (border color) */
            padding: 8px; /* Equivalent to Tailwind p-2 (padding) */
        }

        .text-xl {
            font-size: 1.25rem; /* Equivalent to Tailwind text-xl (font size) */
            line-height: 1.75rem; /* Adjusted line height for better readability */
        }
		.text-sm {
			font-size: .875rem;
			line-height: 1.25rem;
		}
    </style>
	</head>
<body class="bg-gray-100 p-8">

    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
	
		<div class="text-center mb-6">
			<h1 class="text-xl font-bold">FICHE D'ÉVALUATION DU PROJET</h1>
		</div>
		
		<div class="mb-6">
			<h2 class="text-sm font-bold">Apprenant concerné</h2>
			<table class="w-full border-collapse border border-gray-400 mt-2">
				<tr class="border border-gray-400">
					<td class="border border-gray-400 p-2">Nom et prénom :</td>
					<td class="border border-gray-400 p-2">{{ $apprenant->user->nom }} {{ $apprenant->user->prenom }}</td>
				</tr>
				<tr class="border border-gray-400">
					<td class="border border-gray-400 p-2">CNE :</td>
					<td class="border border-gray-400 p-2">{{ $apprenant->cne }}</td>
				</tr>
				<tr class="border border-gray-400">
					<td class="border border-gray-400 p-2">Classe :</td>
					<td class="border border-gray-400 p-2">{{ $apprenant->classe->nom }}</td>
				</tr>
				<tr class="border border-gray-400">
					<td class="border border-gray-400 p-2">Numéro d'ordre :</td>
					<td class="border border-gray-400 p-2">{{ $apprenant->id }}</td>
				</tr>
			</table>
		</div>

		<div class="mb-6">
			<h2 class="text-sm font-bold">Projet réalisé</h2>
			<table class="w-full border-collapse border border-gray-400 mt-2">
				<tr class="border border-gray-400">
					<td class="border border-gray-400 p-2">Titre du projet :</td>
					<td class="border border-gray-400 p-2">{{ $projet->titre }}</td>
				</tr>
				<tr class="border border-gray-400">
					<td class="border border-gray-400 p-2">Module / Unité :</td>
					<td class="border border-gray-400 p-2">{{ $projet->module }}</td>
				</tr>
			</table>
		</div>

		<div class="mb-6">
			<h2 class="text-sm font-bold">Note Produit</h2>
			<table class="w-full border-collapse border border-gray-400 mt-2">
				<tr class="bg-gray-200">
					<th class="border border-gray-400 p-2">Critères</th>
					<th class="border border-gray-400 p-2">Indicateurs</th>
					<th class="border border-gray-400 p-2">Barème</th>
					<th class="border border-gray-400 p-2">Note</th>
					<th class="border border-gray-400 p-2">Commentaire</th>
				</tr>
				@foreach($criteres as $critere)
					<tr>
						<td class="border border-gray-400 p-2" rowspan="{{ count($critere->indicateurs) }}">{{ $critere->libelle }}</td>
						@foreach ($critere->indicateurs as $key => $indicateur)
							@if($key > 0)
								<tr>
							@endif
							<td class="border border-gray-400 p-2">{{ $indicateur->libelle }}</td>
							<td class="border border-gray-400 p-2 text-center">{{ $indicateur->bareme }}</td>
							<td class="border border-gray-400 p-2 text-center">{{ $state['notesProduit'][$critere->id][$indicateur->id] ?? '' }}</td>
							<td class="border border-gray-400 p-2">{{ $state['commentairesProduit'][$critere->id][$indicateur->id] ?? '' }}</td>
							@if($key == 0)
								</tr>
							@endif
						@endforeach
					</tr>
				@endforeach
				<tr>
					<td colspan="4" class="border border-gray-400 p-2 text-right font-bold">Note Totale:</td>
					<td class="border border-gray-400 p-2 font-bold">{{ $noteProduit_total }}</td>
				</tr>
			</table>
		</div>

		<div class="mb-6">
			<h2 class="text-sm font-bold">Note Processus</h2>
			<table class="w-full border-collapse border border-gray-400 mt-2">
				<tr class="bg-gray-200">
					<th class="border border-gray-400 p-2">Note</th>
					<th class="border border-gray-400 p-2">Commentaire</th>
				</tr>
				<tr>
                    <td class="border border-gray-400 p-2 text-center">{{ $noteProcessus_total }}</td>
                    <td class="border border-gray-400 p-2">{{ $state['commentaireProcessus'] ?? '' }}</td>
                </tr>
			</table>
		</div>

		<div class="mb-6">
			<h2 class="text-sm font-bold">Note Propos</h2>
			<table class="w-full border-collapse border border-gray-400 mt-2">
				<tr class="bg-gray-200">
					<th class="border border-gray-400 p-2">Question</th>
					<th class="border border-gray-400 p-2">Réponse</th>
					<th class="border border-gray-400 p-2">Note</th>
					<th class="border border-gray-400 p-2">Commentaire</th>
				</tr>
				@foreach ($questions as $question)
					@php
						$hasResponse = !$question->reponses->isEmpty();
						$notesPropos = isset($state['notesPropos'][$question->id]) ? $state['notesPropos'][$question->id] : null;
						$commentairesPropos = isset($state['commentairesPropos'][$question->id]) ? $state['commentairesPropos'][$question->id] : null;
					@endphp
					<tr>
						<td class="border border-gray-400 p-2">{{ $question->question }}</td>
						<td class="border border-gray-400 p-2">
							@if ($hasResponse)
								@foreach ($question->reponses as $reponse)
									{{ $reponse->reponse }}<br>
								@endforeach
							@else
								<span class="italic text-red-500">Pas de réponse</span>
							@endif
						</td>
						<td class="border border-gray-400 p-2 text-center">
							@if($notesPropos)
								@foreach ($notesPropos as $note)
									{{ $note }}<br>
								@endforeach
							@else

							@endif
						</td>
						
						<td class="border border-gray-400 p-2">
							@if($commentairesPropos)
							@foreach ($commentairesPropos as $commentaire)
								{{ $commentaire }}<br>
							@endforeach
							@else

							@endif
						</td>
					</tr>
				@endforeach
				<tr>
					<td colspan="3" class="border border-gray-400 p-2 text-right font-bold">Note Totale:</td>
					<td class="border border-gray-400 p-2 font-bold">{{ $notePropos_total }}</td>
				</tr>
			</table>
		</div>

		<div>
			<h2 class="text-sm font-bold">Note globale du projet</h2>
			<table class="w-full border-collapse border border-gray-400 mt-2">
				<tr class="bg-gray-200">
					<th class="border border-gray-400 p-2">Note obtenu</th>
					<th class="border border-gray-400 p-2">Appréciation</th>
				</tr>
				<tr>
                    <td class="border border-gray-400 p-2 font-bold text-center">{{ $note_obtenu }}</td>
                    <td class="border border-gray-400 p-2">{{ $state['appreciation'] ?? '' }}</td>
                </tr>
			</table>
		</div>
	</div>
</body>
</html>