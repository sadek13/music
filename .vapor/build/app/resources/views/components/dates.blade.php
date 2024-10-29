<div class="mb-5">
    <h4 class="font-bold m-3">Available Days</h4>
    <table>
        <tbody>
            <tr>
                <td class="p-2">Monday</td>
                <td class="p-2">
                    <input type="checkbox" name="availableDays[]" value="monday" id="mondayAvailable"
                           {{ in_array('monday', request('availableDays', [])) ? 'checked' : '' }}>
                </td>
            </tr>
            <tr>
                <td class="p-2">Tuesday</td>
                <td class="p-2">
                    <input type="checkbox" name="availableDays[]" value="tuesday" id="tuesdayAvailable"
                           {{ in_array('tuesday', request('availableDays', [])) ? 'checked' : '' }}>
                </td>
            </tr>
            <tr>
                <td class="p-2">Wednesday</td>
                <td class="p-2">
                    <input type="checkbox" name="availableDays[]" value="wednesday" id="wednesdayAvailable"
                           {{ in_array('wednesday', request('availableDays', [])) ? 'checked' : '' }}>
                </td>
            </tr>
            <tr>
                <td class="p-2">Thursday</td>
                <td class="p-2">
                    <input type="checkbox" name="availableDays[]" value="thursday" id="thursdayAvailable"
                           {{ in_array('thursday', request('availableDays', [])) ? 'checked' : '' }}>
                </td>
            </tr>
            <tr>
                <td class="p-2">Friday</td>
                <td class="p-2">
                    <input type="checkbox" name="availableDays[]" value="friday" id="fridayAvailable"
                           {{ in_array('friday', request('availableDays', [])) ? 'checked' : '' }}>
                </td>
            </tr>
            <tr>
                <td class="p-2">Saturday</td>
                <td class="p-2">
                    <input type="checkbox" name="availableDays[]" value="saturday" id="saturdayAvailable"
                           {{ in_array('saturday', request('availableDays', [])) ? 'checked' : '' }}>
                </td>
            </tr>
            <tr>
                <td class="p-2">Sunday</td>
                <td class="p-2">
                    <input type="checkbox" name="availableDays[]" value="sunday" id="sundayAvailable"
                           {{ in_array('sunday', request('availableDays', [])) ? 'checked' : '' }}>
                </td>
            </tr>
        </tbody>
    </table>
    <hr class="border-gray-300 my-2 mx-auto my-5" style="width: 50%;" />
</div>
