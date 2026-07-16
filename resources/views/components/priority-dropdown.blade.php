<!-- shared component as dropdown list for priority for create and edit -->
@props(['selected' => null])

<select name="priority" class="form-select" required>
    <option value="Ordinary" class="text-success" {{ $selected == 'Ordinary' ? 'selected' : '' }}>Ordinary</option>
    <option value="Important" class="text-warning" {{ $selected == 'Important' ? 'selected' : '' }}>Important</option>
    <option value="Urgent" class="text-danger" {{ $selected == 'Urgent' ? 'selected' : '' }}>Urgent</option>
</select>
